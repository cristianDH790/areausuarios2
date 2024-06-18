<?php

namespace App\Livewire\DashboardAdmin\Certificate;

use App\Models\service;
use Livewire\Component;
use App\Models\certificate;
use Livewire\WithFileUploads;
use App\Models\type_certificate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
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
    public function save()
    {
        $this->validate([
            'service_id' => 'required',
            'type_certificate_id' => 'required',
            'broadcast_date' => 'required',
            'status' => 'required',
            'photo_front' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',
            'photo_back' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',
            'description' => 'nullable|max:255',
        ]);
        $this->certificate->service_id = $this->service_id;
        $this->certificate->type_certificate_id = $this->type_certificate_id;
        $this->certificate->broadcast_date = $this->broadcast_date;
        $this->certificate->status = $this->status;


        $randomNumber = uniqid(); // Genera un número único
        $fileNamefront = $randomNumber . '_front.' . $this->photo_front->extension();
        $fileNameback = $randomNumber . '_back.' . $this->photo_back->extension();

        $this->photo_front->storeAs('public/certificates', $fileNamefront);
        $this->photo_back->storeAs('public/certificates', $fileNameback);

        $this->certificate->photo_front =  'certificates/' . $fileNamefront;
        $this->certificate->photo_back = 'certificates/' . $fileNameback;


        $this->certificate->description = $this->description;
        $this->certificate->update();

        // $this->certificate->update([
        //     'service_id' => $this->service_id,
        //     'type_certificate_id' => $this->type_certificate_id,
        //     'broadcast_date' => $this->broadcast_date,
        //     'status' => $this->status,
        //     'photo_front' => $this->photo_front ? $this->photo_front->store('certificates') : $this->pathfile,
        //     'photo_back' => $this->photo_back ? $this->photo_back->store('certificates') : $this->pathfile2,
        //     'description' => $this->description,
        // ]);
        $this->alert('success', 'Certificate updated successfully');
        //return redirect()->route('dashboard-admin.certificates.index');
    }
    public function render()
    {
        return view('livewire.dashboard-admin.certificate.edit');
    }
}