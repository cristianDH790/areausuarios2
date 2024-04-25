<?php

namespace App\Livewire\DashboardAdmin\TypeService;

use Livewire\Component;
use App\Models\type_service;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public type_service $type_service;
    public $name;
    public $description;
    protected $rules = [
        'name' => 'required',
        'description' => '',
    ];
    protected $messages = [
        'name.required' => 'The name field is required',
    ];


    public function mount()
    {
        $this->name = $this->type_service->name;
        $this->description = $this->type_service->description;
    }
    public function edit()
    {
        $this->validate();
        $this->type_service->name = $this->name;
        $this->type_service->description = $this->description;
        $this->type_service->update();
        $this->reset('name', 'description');

        $this->flash('success', 'Service type created successfully');
        return redirect()->route('type_service.index');
    }
    public function render()
    {
        return view('livewire.dashboard-admin.type-service.edit');
    }
}