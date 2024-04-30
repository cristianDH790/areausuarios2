<?php

namespace App\Livewire\DashboardAdmin\Service;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\type_service;

use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;
use App\Traits\LivewireLoader;

class Index extends Component
{

    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public $search = "";
    public $type_services;
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


    protected $rules = [
        'name' => 'required|min:6|unique:services,name',
        'start_date' => 'required',
        'end_date' => 'required',
        'type_service_id' => 'required',
        'description' => '',
        'little_description' => '',
        'price' => 'required',
        'slug' => 'required|unique:services,slug',
        'hours' => 'required',
        'price_discount' => 'required',
    ];

    protected $message = [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El campo nombre debe tener al menos 6 caracteres',
        'name.unique' => 'El campo nombre ya existe',
        'start_date.required' => 'El campo fecha de inicio es requerido',
        'end_date.required' => 'El campo fecha de fin es requerido',
        'type_service_id.required' => 'El campo tipo de servicio es requerido',
        'price.required' => 'El campo precio es requerido',
        'slug.required' => 'El campo slug es requerido',
        'slug.unique' => 'El campo slug ya existe',
        'hours.required' => 'El campo horas es requerido',
        'price_discount.required' => 'El campo precio de descuento es requerido',
    ];

    public function mount()
    {
        $this->type_services = type_service::all();
    }
    public function delete($service_id)
    {
        $service = Service::find($service_id);
        $service->delete();
        $this->flash('success', 'service deleted successfully!');
        return redirect()->route('service.index');
    }
    public function save()
    {
        try {
            $this->validate();
            $service = new Service();
            $service->name = $this->name;
            $service->start_date = $this->start_date;
            $service->end_date = $this->end_date;
            $service->type_service_id = $this->type_service_id;
            $service->description = $this->description;
            $service->little_description = $this->little_description;
            $service->price = $this->price;
            $service->slug = Str::slug($this->slug);
            $service->hours = $this->hours;
            $service->price_discount = $this->price_discount;
            $service->code_service = 'S-' . rand(1000, 9999);
            $service->save();
            $this->reset('name', 'start_date', 'end_date', 'type_service_id', 'description', 'little_description', 'price', 'slug', 'hours', 'price_discount');

            $this->flash('success',  'service added successfully!');
            return redirect()->route('service.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {

        $services = Service::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code_service', 'like', '%' . $this->search . '%')
                ->orWhere('start_date', 'like', '%' . $this->search . '%');
        })->paginate(10);



        return view('livewire.dashboard-admin.service.index', compact('services'));
    }
}
