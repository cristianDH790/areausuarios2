<?php

namespace App\Livewire\Components\Customer;

use App\Models\sale;
use App\Models\User;
use Livewire\Component;

class SalesCustomerEdit extends Component
{
    public User $user;
    public sale $sale;

    public $status;
    public $date_sale;
    public $date_sale_pay;
    public $bank_id;
    public $total;
    public $search;

    public $saleDetails;

    public function mount()
    {
        $this->saleDetails = $this->user->sales()->with('saleDetails')->get();
    }

    public function render()
    {
        return view('livewire.components.customer.sales-customer-edit');
    }
}