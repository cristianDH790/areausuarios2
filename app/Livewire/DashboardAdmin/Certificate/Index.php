<?php

namespace App\Livewire\DashboardAdmin\Certificate;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use App\Models\module;
use Livewire\Component;
use App\Models\certificate;
use Livewire\WithPagination;
use App\Models\DatosConfigCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search;

    public function delete($id)
    {
        $certificate = Certificate::find($id);
        Storage::delete('public/' . $certificate->photo_front);
        Storage::delete('public/' . $certificate->photo_back);
        $certificate->delete();
        $this->alert('success', 'certificate successfully deleted');
    }
    public function generatecertificates()
    {
        $certificateId = 1; // ID del certificado que deseas verificar

        $usuariosConCertificado = User::whereHas('certificates', function ($query) use ($certificateId) {
            $query->where('id', $certificateId);
        })->get();

        if ($usuariosConCertificado->isEmpty()) {
            echo "Ningún usuario tiene el certificado con ID $certificateId.";
        } else {
            echo "Usuarios que tienen el certificado con ID $certificateId:";
            foreach ($usuariosConCertificado as $usuario) {
                echo $usuario->name; // Suponiendo que tienes un campo 'name' en tu tabla de usuarios
            }
        }
    }
    public function vinculacion($certificate_id)
    {
        $certificate = Certificate::find($certificate_id);

        if ($certificate) {
            // consulta para obtener todos los usuarios que han comprado el servicio 
            $usuarios = User::select('users.*')
                ->join('sales', 'sales.user_id', '=', 'users.id')
                ->join('sale_details', 'sale_details.sale_id', '=', 'sales.id')
                ->where('sale_details.service_id', $certificate->service_id)
                ->distinct()
                ->get();

            foreach ($usuarios as $usuario) {

                $usuario->certificates()->syncWithoutDetaching([$certificate_id]);
                if ($certificate->status == 'active') {
                    $usuario->certificates()->updateExistingPivot($certificate_id, [
                        'delivered_by' => Auth::user()->name . ' ' . Auth::user()->last_name,
                        'status' => $certificate->status,
                    ]);
                }
            }
            //dd($usuario->certificates);
            $this->alert('success', 'Certificados vinculados correctamente ' . count($usuarios));
        } else {
            $this->alert('error', 'No hay usuarios que hayan adquirido este servicio o certificado');
        }
    }

    public function render()
    {
        $certificates = Certificate::whereHas('service', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->orWhere('status', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.dashboard-admin.certificate.index', compact('certificates'));
    }
}