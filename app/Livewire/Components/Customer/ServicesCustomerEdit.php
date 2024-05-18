<?php

namespace App\Livewire\Components\Customer;

use App\Models\User;
use Livewire\Component;
use App\Models\certificate;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ServicesCustomerEdit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public User $user;
    public certificate $certificate;
    public $status;
    public $file_certificate;
    public $archivoPath;
    public $archivoPathanterior;



    public function mount()
    {
        // Obtener los datos de la tabla pivote para la relación entre el usuario y el certificado
        $pivotData = $this->user->certificates()
            ->wherePivot('certificate_id', $this->certificate->id)
            ->withPivot('path_certificate', 'delivered_by', 'status')
            ->first()
            ->pivot;

        $this->status = $pivotData->status;
        $this->archivoPathanterior = $pivotData->path_certificate;
    }
    public function save()
    {
        $this->validate([
            'status' => 'required',
            'file_certificate' => 'nullable|mimes:pdf|max:25000',
        ]);

        // Verificar si hay un archivo antiguo
        if ($this->archivoPathanterior) {
            // Eliminar el archivo antiguo del almacenamiento
            Storage::delete($this->archivoPathanterior);
        }

        // Guardar el nuevo archivo en el almacenamiento
        if ($this->file_certificate) {
            $this->archivoPath = $this->file_certificate->store('certificates_users', 'public');
        }

        $name_complete = auth()->user()->name . ' ' . auth()->user()->last_name;
        $this->user->certificates()->syncWithoutDetaching([$this->certificate->id => ['status' => $this->status, 'path_certificate' => $this->archivoPath, 'delivered_by' => $name_complete]]);
        $this->alert('success', 'servicio editado con exito!');
    }

    public function render()
    {
        return view('livewire.components.customer.services-customer-edit');
    }
}
