<?php

namespace App\Livewire\DashboardAdmin\SalesUsers;

use App\Models\sale;
use App\Models\finance;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\finance_details;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ValidateFinanceEdit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public sale $sale;

    public $financedetails;

    public $date_sale;
    public $date_sale_pay;
    public $total;
    public $status;
    public $sale_by;

    public $num_pays;
    public $date_start;
    public $date_end;


    public $status_detail = [];
    public $descripcion_detail = [];
    public $photo_comprobante = [];

    public function edit_detail($financeditailid)
    {
        $this->validate([
            'status_detail.' . $financeditailid => 'required|string',
            'descripcion_detail.' . $financeditailid => 'nullable|string',
            'photo_comprobante.' . $financeditailid => 'nullable|image|max:25600', // Max size 25MB
        ]);

        $financeDetail = finance_details::find($financeditailid);
        $financeDetail->status = $this->status_detail[$financeditailid];
        $financeDetail->descriptions = $this->descripcion_detail[$financeditailid];

        if ($this->photo_comprobante[$financeditailid]) {
            // Store the new voucher image
            $path = $this->photo_comprobante[$financeditailid]->store('comprobantes_finacias', 'public');
            $financeDetail->voucher = $path;
        }

        $financeDetail->update();

        $this->alert('success', 'Detalle de financiamiento actualizado correctamente');
    }
    public function mount()
    {
        $this->date_sale = $this->sale->date_sale;
        $this->date_sale_pay = $this->sale->date_sale_pay;
        $this->total = $this->sale->total;
        $this->status = $this->sale->status;
        $this->sale_by = $this->sale->sale_by;
        $finance = finance::where('id', $this->sale->id)->first();

        $this->num_pays = $finance->num_pays;
        $this->date_start = $finance->date_start;
        $this->date_end = $finance->date_end;
        $this->financedetails = finance_details::where('finance_id', $finance->id)->get();
    }

    public function render()
    {
        return view('livewire.dashboard-admin.sales-users.validate-finance-edit');
    }
}