<?php

namespace App\Livewire\DashboardAdmin\Firm;

use App\Models\firm;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public firm $firm;
    public $alias;
    public $name_one;
    public $name_two;
    public $photo_firm;
    public $photo_seal;
    public $pathfile;
    public $pathfile2;

    protected $rules = [
        'alias' => 'required',
        'name_one' => 'required',
        'name_two' => 'required',
        'photo_firm' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',
        'photo_seal' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',
    ];
    protected $message = [
        'alias.required' => 'The alias field is required',
        'name_one.required' => 'Field name one is required',
        'name_two.required' => 'Field name two is required',
        'photo_firm.mimes' => 'The company photo field must be a file of type: jpg, jpeg, png, bmp',
        'photo_firm.max' => 'The company photo field must not exceed 25 MB',
        'photo_seal.mimes' => 'The stamp photo field must be a file of type: jpg, jpeg, png, bmp',
        'photo_seal.max' => 'The stamp photo field must not exceed 25 MB',

    ];

    public function mount()
    {
        $this->alias = $this->firm->alias;
        $this->name_one = $this->firm->name_one;
        $this->name_two = $this->firm->name_two;
        $this->pathfile = $this->firm->photo_firm;
        $this->pathfile2 = $this->firm->photo_seal;
    }
    public function edit()
    {
        $this->validate();
        $this->firm->alias = $this->alias;
        $this->firm->name_one = $this->name_one;
        $this->firm->name_two = $this->name_two;


        if ($this->photo_firm && $this->photo_firm->isValid() && $this->photo_seal && $this->photo_seal->isValid()) {

            if ($this->firm->photo_firm) {
                Storage::delete('public/' . $this->firm->photo_firm);
            }
            if ($this->firm->photo_seal) {
                Storage::delete('public/' . $this->firm->photo_seal);
            }

            $randomNumber = uniqid(); // Genera un número único
            $fileNameFirm = $randomNumber . '_firm.' . $this->photo_firm->extension();
            $fileNameSeal = $randomNumber . '_seal.' . $this->photo_seal->extension();

            $this->photo_firm->storeAs('public/firms', $fileNameFirm);
            $this->photo_seal->storeAs('public/firms', $fileNameSeal);

            $this->firm->photo_firm = 'firms/' . $fileNameFirm;
            $this->firm->photo_seal = 'firms/' . $fileNameSeal;
        }


        $this->firm->update();
        $this->reset('alias', 'name_one', 'name_two', 'photo_firm', 'photo_seal', 'pathfile', 'pathfile2');
        $this->flash('success', 'Firm updated successfully!');
        return redirect()->route('firm.index');
    }
    public function render()
    {
        return view('livewire.dashboard-admin.firm.edit');
    }
}
