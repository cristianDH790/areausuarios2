<?php

namespace App\Livewire\DashboardAdmin\Certificate;

use App\Models\service;
use Livewire\Component;
use App\Models\certificate;
use App\Models\type_certificate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $pathfile;
    public $pathfile2;
    public $services;
    public $type_certificates;

    public $service_id;
    public $type_certificate_id;
    //public $module_id;
    public $broadcast_date;
    public $status;
    public $photo_front;
    public $photo_back;
    //public $url_certificate;
    public $description;

    protected $rules = [
        'service_id' => 'required',
        'type_certificate_id' => 'required',
        'broadcast_date' => 'required',
        'status' => 'required',
        'photo_front' => 'required|mimes:jpg,jpeg,png,bmp|max:25000',
        'photo_back' => 'required|mimes:jpg,jpeg,png,bmp|max:25000',
        'description' => 'required',

    ];
    protected $message = [
        'service_id.required' => 'The service field is required',
        'type_certificate_id.required' => 'The type certificate field is required',
        'broadcast_date.required' => 'The broadcast date field is required',
        'status.required' => 'The status field is required',
        'photo_front.required' => 'The photo front field is required',
        'photo_front.mimes' => 'The photo front must be a file of type: jpg, jpeg, png, bmp',
        'photo_front.max' => 'The photo front may not be greater than 25000 kilobytes',
        'photo_back.mimes' => 'The photo back must be a file of type: jpg, jpeg, png, bmp',
        'photo_back.max' => 'The photo back may not be greater than 25000 kilobytes',
        'photo_back.required' => 'The photo back field is required',
        'description.required' => 'The description field is required',
    ];

    public function mount()
    {
        $this->services = service::all();
        $this->type_certificates = type_certificate::all();
        // $this->type_services = type_service::all();
    }
    public function save()
    {
        $this->validate();
        $certificate = new certificate();
        $certificate->service_id = $this->service_id;
        $certificate->type_certificate_id = $this->type_certificate_id;
        $certificate->broadcast_date = $this->broadcast_date;
        $certificate->status = $this->status;
        $certificate->description = $this->description;

        $randomNumber = uniqid(); // Genera un número único
        $fileNamefront = $randomNumber . '_front.' . $this->photo_front->extension();
        $fileNameback = $randomNumber . '_back.' . $this->photo_back->extension();

        $this->photo_front->storeAs('public/certificates', $fileNamefront);
        $this->photo_back->storeAs('public/certificates', $fileNameback);

        $certificate->photo_front =  'certificates/' . $fileNamefront;
        $certificate->photo_back = 'certificates/' . $fileNameback;

        $certificate->save();

        $this->reset([
            'service_id',
            'type_certificate_id',
            'broadcast_date',
            'status',
            'photo_front',
            'photo_back',
            'description',
        ]);
        $this->flash('success', 'Certificate created successfully');
        return redirect()->route('certificate.index');
    }
    public function render()
    {
        return view('livewire.dashboard-admin.certificate.create');
    }
}