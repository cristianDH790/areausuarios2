<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\certificate;
use App\Models\DatosConfigCertificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // Importar Dompdf correctamente
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;


class CertificateController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.certificate.index');
    }
    public function create()
    {
        return view('dashboardAdmin.certificate.create');
    }
    public function edit($id)
    {
        $certificate = certificate::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.certificate.edit', compact('certificate'));
    }
    // seccion para la generacion de certificados 
    public function GenerarCertificado($id)
    {
        $certificate = certificate::find($id);
        // $texts = DatosConfigCertificate::where('certificate_id', $certificate->id)->get();
        $texts = DatosConfigCertificate::where('certificate_id', $certificate->id)
        ->orderBy('key') // Ordenar por la columna 'key'
        ->get();
        $backgroundImagePath = asset(Storage::url($certificate->photo_front));

      
        $html = view('certificado', compact('certificate', 'texts', 'backgroundImagePath'))->render();
        //  dd($html);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); 

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('Certificado.pdf', ['Attachment' => false]);
    }
    
}