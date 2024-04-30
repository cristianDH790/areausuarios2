<?php

namespace App\Livewire\DashboardAdmin\Firm;


use App\Models\firm;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Index extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $search = "";

    public $alias;
    public $name_one;
    public $name_two;
    public $photo_firm;
    public $photo_seal;


    protected $rules = [
        'alias' => 'required',
        'name_one' => 'required',
        'name_two' => 'required',
        'photo_firm' => 'required|mimes:jpg,jpeg,png,bmp|max:25000|unique:firms,photo_firm',
        'photo_seal' => 'required|mimes:jpg,jpeg,png,bmp|max:25000|unique:firms,photo_seal',
    ];
    protected $message = [
        'alias.required' => 'The alias field is required',
        'name_one.required' => 'Field name one is required',
        'name_two.required' => 'Field name two is required',
        'photo_firm.required' => 'The company photo field is required',
        'photo_firm.mimes' => 'The company photo field must be a file of type: jpg, jpeg, png, bmp',
        'photo_firm.max' => 'The company photo field must not exceed 25 MB',
        'photo_seal.required' => 'The stamp photo field is required',
        'photo_seal.mimes' => 'The stamp photo field must be a file of type: jpg, jpeg, png, bmp',
        'photo_seal.max' => 'The stamp photo field must not exceed 25 MB',
    ];

    public function delete($id)
    {
        $firm = firm::find($id);
        Storage::delete('public/' . $firm->photo_firm);
        Storage::delete('public/' . $firm->photo_seal);
        $firm->delete();
        $this->flash('success', 'firm deleted successfully!');
    }

    public function save()
    {
        try {
            $this->validate();

            $firm = new firm();
            $firm->alias = $this->alias;
            $firm->name_one = $this->name_one;
            $firm->name_two = $this->name_two;

            if ($this->photo_firm && $this->photo_firm->isValid() && $this->photo_seal && $this->photo_seal->isValid()) {

                $randomNumber = uniqid(); // Genera un número único
                $fileNameFirm = $randomNumber . '_firm.' . $this->photo_firm->extension();
                $fileNameSeal = $randomNumber . '_seal.' . $this->photo_seal->extension();

                $this->photo_firm->storeAs('public/firms', $fileNameFirm);
                $this->photo_seal->storeAs('public/firms', $fileNameSeal);

                $firm->photo_firm = 'firms/' . $fileNameFirm;
                $firm->photo_seal = 'firms/' . $fileNameSeal;
            }


            $firm->save();

            $this->reset('alias', 'name_one', 'name_two', 'photo_firm', 'photo_seal');
            $this->flash('success',  'firm added successfully!');
            return redirect()->route('firm.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {
        $firms = firm::where(function ($query) {
            $query->where('alias', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.dashboard-admin.firm.index', compact('firms'));
    }
}
