<?php

namespace App\Livewire\DashboardAdmin\Settings;

use App\Models\setting;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $phone_sale;
    public $phone_contact;

    public function mount()
    {
        $settings = setting::first();
        if ($settings) {
            $this->phone_sale = $settings->phone_sale;
            $this->phone_contact = $settings->phone_contact;
        } else {
            $this->phone_sale = "";
            $this->phone_contact = "";
        }
    }
    public function save()
    {
        $settings = setting::first();
        if ($settings) {
            $settings->phone_sale = $this->phone_sale;
            $settings->phone_contact = $this->phone_contact;
            $settings->update();
            $this->alert('success', 'Configuracion actualizada con exito');
        } else {
            $settings2 = new setting();
            $settings2->phone_sale = $this->phone_sale;
            $settings2->phone_contact = $this->phone_contact;
            $settings2->save();
            $this->alert('success', 'Configuracion Creada con exito');
        }
    }

    public function render()
    {
        return view('livewire.dashboard-admin.settings.index');
    }
}
