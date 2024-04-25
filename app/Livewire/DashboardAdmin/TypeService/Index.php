<?php

namespace App\Livewire\DashboardAdmin\TypeService;

use Livewire\Component;
use App\Models\type_service;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $search = "";

    public $name;
    public $description;
    protected $rules = [
        'name' => 'required|min:3|unique:type_services,name',
        'description' => '',
    ];
    protected $messages = [
        'name.required' => 'The name field is required.',
        'name.min' => 'The name field must be at least 3 characters.',
        'name.unique' => 'The name field must be unique.',

    ];

    public function update($type_service_id)
    {
        try {
            $this->validate([
                'name' => 'required|min:3',
                'description' => '',
            ]);

            $type_service = type_service::find($type_service_id);
            $type_service->name = $this->name;
            $type_service->description = $this->description;
            $type_service->save();

            $this->flash('success', 'Type Service updated successfully!');
            return redirect()->route('type_service.index');
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }


    public function delete($type_service_id)
    {
        $type_service = type_service::find($type_service_id);
        $type_service->delete();
        $this->flash('success', 'Type Service deleted successfully!');
        return redirect()->route('type_service.index');
    }

    public function save()
    {
        try {
            $this->validate();
            $type_service = new type_service();
            $type_service->name = $this->name;
            $type_service->description = $this->description;
            $type_service->code = 'TS-' . random_int(1000, 9999) . '';
            $type_service->save();
            $this->reset(['name', 'description']);
            $this->flash('success', 'Type Service added successfully!');
            return redirect()->route('type_service.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {
        $type_services = type_service::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.dashboard-admin.type-service.index', compact('type_services'));
    }
}
