<?php

namespace App\Livewire\DashboardCustomer\Service;

use Livewire\Component;

class Index extends Component
{
    public function vermas()
    {
        dd('hola');
    }
    public function render()
    {
        return view('livewire.dashboard-customer.service.index');
    }
}
