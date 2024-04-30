<?php

namespace App\Livewire\DashboardAdmin\Exhibitor;

use Livewire\Component;
use App\Models\exhibitor;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public exhibitor $exhibitor;
    public $name;
    public $last_name;
    public $prefix;
    public $phone;
    public $document;
    public $review;
    public $photo;
    public $pathfile;
    public $file;

    protected $rules = [
        'name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'prefix' => 'required',
        'phone' => 'required|min:6',
        'review' => 'nullable|max:255',
        'document' => 'required',
        'file' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',
    ];

    protected $message = [
        'name.required' => 'The name field is required',
        'name.min' => 'The name field must be at least 2 characters',
        'last_name.required' => 'The last name field is required',
        'last_name.min' => 'The last name field must be at least 2 characters',
        'prefix.required' => 'The prefix field is required',
        'phone.required' => 'The phone field is required',
        'phone.min' => 'The phone field must be at least 6 characters',
        'document.required' => 'The document field is required',
        'file.mimes' => 'The file must be an image',
        'file.max' => 'The file must not weigh more than 25MB',

    ];

    public function mount()
    {
        $this->name = $this->exhibitor->name;
        $this->last_name = $this->exhibitor->last_name;
        $this->prefix = $this->exhibitor->prefix;
        $this->phone = $this->exhibitor->phone;
        $this->document = $this->exhibitor->document;
        $this->review = $this->exhibitor->review;
        $this->photo = $this->exhibitor->photo;
        $this->pathfile = $this->exhibitor->photo;
    }
    public function edit()
    {
        $this->validate();
        $this->exhibitor->name = $this->name;
        $this->exhibitor->last_name = $this->last_name;
        $this->exhibitor->prefix = $this->prefix;
        $this->exhibitor->phone = $this->phone;
        $this->exhibitor->document = $this->document;
        $this->exhibitor->review = $this->review;


        if ($this->file && $this->file->isValid()) {

            if ($this->exhibitor->photo) {
                Storage::delete('public/' . $this->exhibitor->photo);
            }


            $this->file->storeAs('public/exhibitor', $this->document . '.' . $this->file->extension());
            $this->exhibitor->photo = 'exhibitor/' . $this->document . '.' . $this->file->extension();
        }


        $this->exhibitor->update();
        $this->reset('name', 'last_name', 'prefix', 'phone', 'document', 'review', 'file', 'pathfile');
        $this->flash('success', 'Exhibitor updated successfully!');
        return redirect()->route('exhibitor.index');
    }

    public function render()
    {
        return view('livewire.dashboard-admin.exhibitor.edit');
    }
}
