<?php

namespace App\Livewire\DashboardAdmin\Certificate;

use App\Models\service;
use Livewire\Component;
use App\Models\certificate;
use App\Models\type_certificate;

class Edit extends Component
{
    public certificate $certificate;
    public $service_id;
    public $type_certificate_id;
    public $broadcast_date;
    public $status;
    public $photo_front;
    public $photo_back;
    public $description;
    public $pathfile;
    public $pathfile2;


    public $services;
    public $type_certificates;
    public function mount()
    {
        $this->services = service::all();
        $this->type_certificates = type_certificate::all();
        $this->service_id = $this->certificate->service_id;
        $this->type_certificate_id = $this->certificate->type_certificate_id;
        $this->broadcast_date = $this->certificate->broadcast_date;
        $this->status = $this->certificate->status;
        $this->pathfile = $this->certificate->photo_front;
        $this->pathfile2 = $this->certificate->photo_back;
        $this->description = $this->certificate->description;
    }
    public function render()
    {
        return view('livewire.dashboard-admin.certificate.edit');
    }
}
