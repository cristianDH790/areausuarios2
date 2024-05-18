<?php

namespace App\Livewire\DashboardAdmin\Home;

use App\Models\sale;
use App\Models\User;

use Livewire\Component;
use App\Models\certificate;
use App\Models\type_service;

class Index extends Component
{

    public function render()
    {
        $customers = User::role('customer')->get();
        $sales = sale::all();
        $type_services = type_service::all();
        $certificates = certificate::all();
        return view('livewire.dashboard-admin.home.index', compact('customers', 'sales', 'certificates', 'type_services'));
    }
}
