<?php

namespace App\Livewire\DashboardAdmin\SalesUsers;

use App\Models\sale;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class ValidateSale extends Component
{


    public $status;
    public $date_sale;
    public $date_sale_pay;
    public $bank_id;
    public $total;
    public $search;

    use LivewireAlert;

    public $description_validate;
    public $status_validate;

    protected $rules = [
        'description_validate' => 'required',
        'status_validate' => 'required',
    ];
    protected $messages = [
        'description_validate.required' => 'El campo descripción es obligatorio',
        'status_validate.required' => 'El campo estado es obligatorio',
    ];
    public function delete($sale)
    {
        $sale = sale::find($sale);
        $sale->delete();
        $this->alert('success', 'Venta eliminada con exito!');
    }

    public function validar_venta($sale_id)
    {
        try {
            $this->validate();

            $sale = sale::where('id', $sale_id)->firstOrFail();

            if ($this->status_validate == 'pending') {
                $sale->debt = 'si';
            } else {
                $sale->debt = 'no';
            }
            $sale->description_validate = $this->description_validate;
            $sale->status = $this->status_validate;
            $sale->update();
            $this->alert('success', 'Venta validada con exito!');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {
        $sales = Sale::where('debt', 'no') // Filtra las ventas donde debt es 'no'
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('document', 'like', '%' . $this->search . '%'); // Búsqueda por nombre o documento
            })
            ->orderByRaw("status = 'validate' DESC") // Pone primero las ventas con estado 'validate'
            ->orderByDesc('created_at') // Ordena por fecha de creación, los más recientes primero
            ->paginate(10);



        return view('livewire.dashboard-admin.sales-users.validate-sale', compact('sales'));
    }
}