<?php

namespace App\Livewire\DashboardCustomer\MyService;


use App\Models\service;
use App\Models\type_service;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $type_service_id;
    public $type_service_count;
    public function render()
    {
        $user = Auth::user();

        // Obtener los IDs de los servicios relacionados con las ventas del usuario
        $servicios = $user->sales()->with('saleDetails.service')->get()->pluck('saleDetails')->flatten()->pluck('service')->unique();
        $servicesAdquiridos = $servicios->pluck('id');
        $type_services = type_service::all();

        if ($this->type_service_id) {
            // Obtener todos los servicios adquiridos por el usuario del tipo especificado
            $services = Service::whereIn('id', $servicesAdquiridos)
                ->where('type_service_id', $this->type_service_id)
                ->get();
        } else {
            // Si no se selecciona ningún tipo de servicio, obtener todos los servicios que no han sido adquiridos por el usuario
            $services = Service::whereIn('id', $servicesAdquiridos)->get();
        }

        $this->type_service_count = $this->type_service_id;
        return view('livewire.dashboard-customer.my-service.index', compact('services', 'type_services',));
    }
}

