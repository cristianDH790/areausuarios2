<?php

namespace App\Livewire\DashboardAdmin\Settings;

use App\Models\setting;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use LivewireAlert;
    public $phone_sale;
    public $phone_contact;
    use WithFileUploads;
    public $nombre_boleta;
    public $ruc_boleta;
    public $direccion_boleta;
    public $propietario_boleta;
    public $photo_logotipo;
    public  $email_boleta;
    public function mount()
    {
        $settings = setting::first();
        if ($settings) {
            $this->phone_sale = $settings->phone_sale;
            $this->phone_contact = $settings->phone_contact;
            $this->nombre_boleta = $settings->name_boleta;
            $this->ruc_boleta = $settings->ruc_boleta;
            $this->direccion_boleta = $settings->direccion_boleta;
            $this->propietario_boleta = $settings->propietario_boleta;
            $this->photo_logotipo = $settings->logo;
            $this->email_boleta = $settings->email_boleta;
        } else {
            $this->phone_sale = "";
            $this->phone_contact = "";
            $this->nombre_boleta = "";
            $this->ruc_boleta = "";
            $this->direccion_boleta = "";
            $this->propietario_boleta = "";
            $this->photo_logotipo = "";
            $this->email_boleta = "";
        }
    }
    public function save()
    {


        $settings = setting::first();
        if ($settings) {
            $settings->phone_sale = $this->phone_sale;
            $settings->phone_contact = $this->phone_contact;
            $settings->name_boleta = $this->nombre_boleta;
            $settings->ruc_boleta = $this->ruc_boleta;
            $settings->direccion_boleta = $this->direccion_boleta;
            $settings->propietario_boleta = $this->propietario_boleta;
            $settings->email_boleta = $this->email_boleta;

            if ($this->photo_logotipo instanceof \Illuminate\Http\UploadedFile) {
                $fileNamefront = 'logo.' . $this->photo_logotipo->extension();
                $this->photo_logotipo->storeAs('public/settings', $fileNamefront);
                $settings->logo = 'settings/' . $fileNamefront;
            }

            $settings->update();
            $this->alert('success', 'Configuración actualizada con éxito');
        } else {
            $settings2 = new setting();
            $settings2->phone_sale = $this->phone_sale;
            $settings2->phone_contact = $this->phone_contact;
            $settings2->name_boleta = $this->nombre_boleta;
            $settings2->ruc_boleta = $this->ruc_boleta;
            $settings2->direccion_boleta = $this->direccion_boleta;
            $settings2->propietario_boleta = $this->propietario_boleta;
            $settings2->email_boleta = $this->email_boleta;
            if ($this->photo_logotipo instanceof \Illuminate\Http\UploadedFile) {
                $fileNamefront = 'logo.' . $this->photo_logotipo->extension();
                $this->photo_logotipo->storeAs('public/settings', $fileNamefront);
                $settings2->logo = 'settings/' . $fileNamefront;
            }

            $settings2->save();
            $this->alert('success', 'Configuración creada con éxito');
        }
    }


    public function render()
    {
        return view('livewire.dashboard-admin.settings.index');
    }
}