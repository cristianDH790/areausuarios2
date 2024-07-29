<?php

namespace App\Http\Controllers\DashboardAdmin;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\firm;
use App\Models\User;
use App\Models\module;
use App\Models\certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use App\Models\DatosConfigCertificate;
use App\Models\service;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf; // Importar Dompdf correctamente
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

//use Intervention\Image\ImageManagerStatic as Image;

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

        //traer sus modulos
        $temarios = module::where('certificate_id', $certificate->id)
            ->with('topics.sub_Topics')
            ->get();


        // $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $imagePath = public_path(Storage::url($certificate->photo_front));
        $imageData = base64_encode(file_get_contents($imagePath));
        $backgroundImageBase64 = 'data:image/jpeg;base64,' . $imageData;

        //$qr = $this->GenerarQr();

        // $firmas_all = firm::where('certificate_id', $certificate->id)->get();
        $html = view('certificado', compact('certificate', 'texts', 'temarios',  'backgroundImageBase64'))->render();
        //  dd($html);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        // $output = $pdf->output();
        // $publicPath = public_path('pdfs/mi_documento.pdf');
        // //Verifica si el directorio existe y créalo si no es así
        // $pdfDir = dirname($publicPath);
        // if (!file_exists($pdfDir)) {
        //     mkdir($pdfDir, 0755, true);
        // }
        // file_put_contents($publicPath, $output);
        return $pdf->stream('Certificado.pdf', ['Attachment' => false]);
    }
    public function GenerarCertificadoMasivo($service, $code)
    {
        
        $servicio = service::find($service);


        $certificate = certificate::find($servicio->certificate->id);

        // dd($certificate);
        $users = User::where('code', $code)->first();
        $texts = DatosConfigCertificate::where('certificate_id', $certificate->id)
            ->orderBy('key') // Ordenar por la columna 'key'
            ->get();

        //traer sus modulos
        $temarios = module::where('certificate_id', $certificate->id)
            ->with('topics.sub_Topics')
            ->get();


        // $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $imagePath = public_path(Storage::url($certificate->photo_front));
        $imageData = base64_encode(file_get_contents($imagePath));
        $backgroundImageBase64 = 'data:image/jpeg;base64,' . $imageData;

        //$qr = $this->GenerarQr();

        // $firmas_all = firm::where('certificate_id', $certificate->id)->get();
        $html = view('certificado_masivo', compact('certificate', 'texts', 'temarios', 'users', 'servicio', 'code', 'backgroundImageBase64'))->render();
        //  dd($html);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $output = $pdf->output();
        $name = $users->name . ' ' . $users->last_name;
        $codigoU = $users->code . '-' . $servicio->code_service;
        $publicPath = public_path('Certificate_Users/' . $name . '-' . $codigoU .  '.pdf');
        //Verifica si el directorio existe y créalo si no es así
        $pdfDir = dirname($publicPath);
        if (!file_exists($pdfDir)) {
            mkdir($pdfDir, 0755, true);
        }
        file_put_contents($publicPath, $output);
        return $pdf->stream('Certificado.pdf', ['Attachment' => false]);
    }
    public function GenerarCertificadoMasivoBlanco($service, $code)
    {

        $servicio = service::find($service);


        $certificate = certificate::find($servicio->certificate->id);

        // dd($certificate);
        $users = User::where('code', $code)->first();
        $texts = DatosConfigCertificate::where('certificate_id', $certificate->id)
            ->orderBy('key') // Ordenar por la columna 'key'
            ->get();

        //traer sus modulos
        $temarios = module::where('certificate_id', $certificate->id)
            ->with('topics.sub_Topics')
            ->get();


        // $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        $imagePath = public_path(Storage::url($certificate->photo_front));
        $imageData = base64_encode(file_get_contents($imagePath));
        $backgroundImageBase64 = 'data:image/jpeg;base64,' . $imageData;

        //$qr = $this->GenerarQr();

        // $firmas_all = firm::where('certificate_id', $certificate->id)->get();
        $html = view('certificado_masivo_blanco', compact('certificate', 'texts', 'temarios', 'users', 'servicio',  'backgroundImageBase64'))->render();
        //  dd($html);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        // $output = $pdf->output();
        // $name = $users->name . ' ' . $users->last_name;
        // $codigoU = $users->code . '-' . $servicio->code_service;
        // $publicPath = public_path('Certificate_Users/' . $name . '-' . $codigoU .  '.pdf');
        // //Verifica si el directorio existe y créalo si no es así
        // $pdfDir = dirname($publicPath);
        // if (!file_exists($pdfDir)) {
        //     mkdir($pdfDir, 0755, true);
        // }
        // file_put_contents($publicPath, $output);
        return $pdf->stream('Certificado.pdf', ['Attachment' => false]);
    }
}