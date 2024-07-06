<?php

namespace App\Livewire\Presentation\Curso;

use Livewire\Component;

use App\Models\service;
use App\Models\setting;
use function PHPSTORM_META\type;

use App\Models\type_service;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $type_service_id;
    public $type_service_count;
    public $contact;
    public function render()
    {
        // $user = Auth::user();

        // Obtener los IDs de los servicios relacionados con las ventas del usuario
        // $servicios = $user->sales()->with('saleDetails.service')->get()->pluck('saleDetails')->flatten()->pluck('service')->unique();
        // $servicesAdquiridos = $servicios->pluck('id');
        $type_services = type_service::all();
        $services = service::all();
        if ($this->type_service_id) {
            // Si se selecciona un tipo de servicio, obtener los servicios de ese tipo que no han sido adquiridos por el usuario
            $services = Service::where('type_service_id', $this->type_service_id)->get();
        }


        // $this->type_service_count = $this->type_service_id;

        // $user = Auth::user();

        //setiings 


        $settings = setting::first();
        if ($settings != null) {
            $contact = $settings->phone_sale;
        } else {
            $contact = '0000000';
        }
        return view('livewire.presentation.curso.index', compact('services', 'type_services',));
    }
}
