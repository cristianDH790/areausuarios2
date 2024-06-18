<?php

namespace App\Livewire\DashboardCustomer\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{




    public function render()
    {
        $user = Auth::user();


        // // Obtener todas las ventas del usuario y luego obtener los detalles de venta relacionados
        // $detallesVenta = $user->sales()->with('saleDetails')->get()->pluck('saleDetails')->flatten();

        // // Inicializar una colección para almacenar los servicios relacionados
        // $servicios = collect();

        // // Recorrer los detalles de venta y obtener los servicios relacionados para cada uno
        // foreach ($detallesVenta as $detalleVenta) {
        //     // Obtener los servicios relacionados para este detalle de venta y agregarlos a la colección de servicios
        //     $servicios = $servicios->merge($detalleVenta->service()->get());
        //}
        //certificate

        // Obtener todas las ventas del usuario con los detalles de venta y los servicios relacionados
        $servicios = $user->sales()->with('saleDetails.service')->get()->pluck('saleDetails')->flatten()->pluck('service')->unique();

        //dd($services2);





        // Ahora $detallesVenta contiene todos los detalles de venta relacionados con las ventas del usuario
        return view('livewire.dashboard-customer.home.index', compact('servicios'));
    }

}

