<?php

namespace App\Livewire\DashboardAdmin\Service;

use App\Models\firm;
use App\Models\service;
use Livewire\Component;
use App\Models\exhibitor;

use Illuminate\Support\Str;

use App\Models\type_service;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $type_services;
    public $file;
    public $pathfile;
    public service $service;
    public $name;
    public $start_date;
    public $end_date;
    public $type_service_id;
    public $description;
    public $little_description;
    public $price;
    public $slug;
    public $hours;
    public $price_discount;
    public $code_service;

    public $exhibitors;
    public $firms;
    public $serviceexhibitor;
    public $servicefirm;

    public $link_brochure;
    public $link_video;



    protected $rules = [
        'name' => 'required|min:6',
        'start_date' => 'required',
        'end_date' => 'required',
        'type_service_id' => 'required',
        'description' => '',
        'little_description' => '',
        'price' => 'required',
        'serviceexhibitor.*'  => 'boolean',
        'servicefirm.*'  => 'boolean',
        'hours' => 'required',
        'price_discount' => 'required',
        'file' => 'nullable|mimes:jpg,jpeg,png,bmp|max:25000',

    ];
    protected $message = [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El campo nombre debe tener al menos 6 caracteres',
        'name.unique' => 'El campo nombre ya existe',
        'start_date.required' => 'El campo fecha de inicio es requerido',
        'end_date.required' => 'El campo fecha de fin es requerido',
        'type_service_id.required' => 'El campo tipo de servicio es requerido',
        'price.required' => 'El campo precio es requerido',

        'hours.required' => 'El campo horas es requerido',
        'price_discount.required' => 'El campo precio de descuento es requerido',
        'file.mimes' => 'El archivo debe ser una imagen',
        'file.max' => 'El archivo no debe pesar mas de 25MB',


    ];

    public function mount()
    {
        $this->type_services = type_service::all();
        $this->name = $this->service->name;
        $this->start_date = $this->service->start_date;
        $this->end_date = $this->service->end_date;
        $this->type_service_id = $this->service->type_service_id;
        $this->description = $this->service->description;
        $this->little_description = $this->service->little_description;
        $this->price = $this->service->price;
        $this->slug = $this->service->slug;
        $this->hours = $this->service->hours;
        $this->price_discount = $this->service->price_discount;
        $this->pathfile = $this->service->image;
        $this->code_service = $this->service->code_service;
        $this->link_brochure = $this->service->link_brochure;
        $this->link_video = $this->service->link_video;



        $this->firms = firm::get();
        $this->exhibitors = exhibitor::get();

        //$this->permissions = Permission::get();

        $currentserviceexhibitors = $this->service->exhibitors->pluck('id')->toArray();
        foreach ($this->exhibitors as $exhibitor) {
            $this->serviceexhibitor[$exhibitor->id] = in_array($exhibitor->id, $currentserviceexhibitors);
        }
        $currentservicefirms = $this->service->firms->pluck('id')->toArray();
        foreach ($this->firms as $firm) {
            $this->servicefirm[$firm->id] = in_array($firm->id, $currentservicefirms);
        }
    }
    public function edit()
    {
        $this->validate();
        $this->service->name = $this->name;
        $this->service->start_date = $this->start_date;
        $this->service->end_date = $this->end_date;
        $this->service->type_service_id = $this->type_service_id;
        $this->service->description = $this->description;
        $this->service->little_description = $this->little_description;
        $this->service->price = $this->price;

        $this->service->slug = Str::slug($this->name);

        $this->service->hours = $this->hours;
        $this->service->price_discount = $this->price_discount;
        $this->service->link_brochure = $this->link_brochure;
        $this->service->link_video = $this->link_video;
        if ($this->serviceexhibitor) {
            $this->service->exhibitors()->sync(array_keys(array_filter($this->serviceexhibitor)));
        }
        if ($this->servicefirm) {
            $this->service->firms()->sync(array_keys(array_filter($this->servicefirm)));
        }


        if ($this->file && $this->file->isValid()) {

            if ($this->service->image) {
                Storage::delete('public/' . $this->service->image);
            }


            $this->file->storeAs('public/services', $this->service->code_service . '.' . $this->file->extension());
            $this->service->image = 'services/' . $this->service->code_service . '.' . $this->file->extension();
        }


        $this->service->save();
        $this->reset('name', 'start_date', 'end_date', 'type_service_id', 'description', 'little_description', 'price', 'slug', 'hours', 'price_discount', 'file');
        $this->flash('success', 'service updated successfully!');
        return redirect()->route('service.index');
    }
    public function render()
    {
        return view('livewire.dashboard-admin.service.edit');
    }
}