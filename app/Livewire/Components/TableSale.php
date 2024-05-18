<?php

namespace App\Livewire\Components;

use App\Models\service;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\shopping_carts;

class TableSale extends Component
{
    use WithPagination;
    public $search_services = "";
    public $price_end;
    public  $precio_view = 0.0; //precio que se vera abajo de la tabla



    public function preciofinal()
    {
        $service_adds = shopping_carts::all();
        $total = 0;
        foreach ($service_adds as $service_add) {
            $total += $service_add->price_end;
        }
        $this->precio_view = $total;
    }
    public function addservice($serviceId)
    {
        $service = Service::find($serviceId);
        $service_add = new shopping_carts();
        $service_add->service_id = $service->id;
        $service_add->name_service =    $service->name;
        $service_add->price_service =   $service->price;
        $service_add->price_discount_service =  $service->price_discount;
        $service_add->price_end =  $service->price;
        $service_add->save();
    }
    public function removeService($serviceId)
    {
        $service_add = shopping_carts::where('service_id', $serviceId)->first();
        $service_add->delete();
    }
    public function editPrice($serviceId)
    {
        try {
            $this->validate(
                [
                    'price_end' => 'required'
                ],
                [
                    'price_end.required' => 'El campo Precio Total es obligatorio.'
                ]
            );
            $service_add = shopping_carts::where('service_id', $serviceId)->first();
            $service_add->price_end = $this->price_end;
            $service_add->update();
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        $this->preciofinal();
        $service_adds = shopping_carts::all();
        $services = service::where('name', 'like', '%' . $this->search_services . '%')
            ->orWhere('code_service', 'like', '%' . $this->search_services . '%')
            ->paginate(5);
        return view('livewire.components.table-sale', compact('services', 'service_adds'));
    }
}