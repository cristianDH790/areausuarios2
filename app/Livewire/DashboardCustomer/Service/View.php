<?php

namespace App\Livewire\DashboardCustomer\Service;

use App\Models\service;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public service $service;
    public function mount()
    {
    }
    public function render()
    {
        $exhibitors = $this->service->exhibitors;
        // $services = Service::where('type_service_id', $this->service->type_service_id)
        //     ->where('id', '!=', $this->service->id) // Excluir el servicio actual
        //     ->inRandomOrder()
        //     ->take(3)
        //     ->get();

        $user = Auth::user();

        // Obtener los IDs de los servicios relacionados con las ventas del usuario
        $servicios = $user->sales()->with('saleDetails.service')->get()->pluck('saleDetails')->flatten()->pluck('service')->unique();
        $servicesAdquiridos = $servicios->pluck('id');



        // Si se selecciona un tipo de servicio, obtener los servicios de ese tipo que no han sido adquiridos por el usuario

        $services = Service::where('type_service_id', $this->service->type_service_id)
            ->whereNotIn('id', $servicesAdquiridos)
            ->whereNotIn('id', [$this->service->id]) // Excluir el servicio actual
            ->inRandomOrder()
            ->take(3)
            ->get();





        return view('livewire.dashboard-customer.service.view', compact('exhibitors', 'services'));

    }
}
