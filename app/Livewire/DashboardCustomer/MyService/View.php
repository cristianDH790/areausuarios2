<?php

namespace App\Livewire\DashboardCustomer\MyService;

use App\Models\service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class View extends Component
{
    use LivewireAlert;
    public service $service;
    public function render()
    {
        $exhibitors = $this->service->exhibitors;
        $certificate = $this->service->certificate;
        //$modulos = $certificate->modules;


        if ($certificate) {
            $modules = $certificate->modules;
            // Ahora puedes trabajar con los módulos del certificado
        } else {
            $modules = null;
            $this->alert('error', 'No se subio los modulos aun, comuniquese con su asesor.');
        }

        return view('livewire.dashboard-customer.my-service.view', compact('exhibitors', 'certificate', 'modules'));
    }
}