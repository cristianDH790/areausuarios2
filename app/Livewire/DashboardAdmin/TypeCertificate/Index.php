<?php

namespace App\Livewire\DashboardAdmin\TypeCertificate;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\type_certificate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $search;

    public $name;
    protected $rules = [
        'name' => 'required|min:3|max:255|unique:type_certificates,name',
    ];
    protected $message = [
        'name.required' => 'The name field is required',
        'name.min' => 'The name must be at least 3 characters',
        'name.max' => 'The name may not be greater than 255 characters',
        'name.unique' => 'The name has already been taken',
    ];

    public function delete($id)
    {
        $type_certificate = type_certificate::find($id);
        $type_certificate->delete();
        $this->alert('success', 'type certificate deleted successfully');
    }
    public function save()
    {
        try {
            $this->validate();
            $type_certificate = new type_certificate();
            $type_certificate->name = strtoupper($this->name);
            $random_number = uniqid(); // Genera un identificador único basado en la hora actual
            $type_certificate->code = strtoupper(substr($this->name, 0, 2)) . "-" . $random_number;
            $type_certificate->save();
            $this->reset('name');
            $this->flash('success', 'type certificate created successfully');
            return redirect()->route('type_certicate.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function render()
    {
        $type_certificates = type_certificate::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.dashboard-admin.type-certificate.index', compact('type_certificates'));
    }
}
