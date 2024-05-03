<?php

namespace App\Livewire\DashboardAdmin\Certificate\Module;

use App\Models\certificate;
use App\Models\module;
use App\Models\service;
use Livewire\Component;

class Edit extends Component
{
    public certificate $certificate;
    public $modules;
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.dashboard-admin.certificate.module.edit');
    }
}