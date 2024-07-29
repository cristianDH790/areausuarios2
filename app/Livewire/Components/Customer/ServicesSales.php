<?php

namespace App\Livewire\Components\Customer;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ServicesSales extends Component
{
    use LivewireAlert;
    public User $user;
    public $search;
    public function mount()
    {
    }
    
    public function delete_sale($sale_id)
    {

        $sale = $this->user->sales()->with('saleDetails')->find($sale_id);
        //$salesDetailsCount = $sale->saleDetails->count();
        foreach ($sale->saleDetails as $saleDetail) {
            //dd($saleDetail->service_id);
            $serviceId = $saleDetail->service_id;
            // $service = $this->user->services()->where('id', $serviceId)->firstOrFail();
            $certificate = $this->user->certificates()->where('id', $serviceId)->firstOrFail();

            $this->user->certificates()->detach($certificate);
            $saleDetail->delete();
        }
        $this->user->sales()->where('id', $sale_id)->delete();
        $this->flash('success', 'Venta eliminada con éxito');
        return redirect()->route('customer.edit', $this->user->code);
    }
    public function render()
    {
        $sales = $this->user->sales()
            ->where('user_id', $this->user->id) // Filtrar por el ID del usuario
            ->where(function ($query) {
                $query->where('date_sale', 'like', '%' . $this->search . '%')
                    ->orWhere('date_sale_pay', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.components.customer.services-sales', compact('sales'));
    }
}