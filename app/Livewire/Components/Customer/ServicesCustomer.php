<?php

namespace App\Livewire\Components\Customer;

use App\Models\User;
use Livewire\Component;

class ServicesCustomer extends Component
{
    public User $user;
    // public $certificates;
    public $search;

    public function mount()
    {
    }
    public function render()
    {

        $certificates = $this->user->certificates()
            ->where(function ($query) {
                $query->where('type_certificate_id', 'like', '%' . $this->search . '%')
                    ->orWhere('service_id', 'like', '%' . $this->search . '%')
                    ->orWhereHas('type_certificate', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('service', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('code_service', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate(10);



        return view('livewire.components.customer.services-customer', compact('certificates'));
    }
}
