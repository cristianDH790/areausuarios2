<?php

namespace App\Http\Controllers\DashboardAdmin;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoletaController extends Controller
{

    public function GenerarBoletaMasivo($code, $sale)
    {

        $user  = User::where('code', $code)->firstOrFail();
        $sale = $user->sales()->where('id', $sale)->firstOrFail();

        $saleDetails = $user->sales()->with('saleDetails')->get();

        $settings = setting::first();


        // $servicio = service::find($service);


        // $certificate = certificate::find($servicio->certificate->id);

        // // dd($certificate);
        // $users = User::where('code', $code)->first();
        // $texts = DatosConfigCertificate::where('certificate_id', $certificate->id)
        //     ->orderBy('key') // Ordenar por la columna 'key'
        //     ->get();

        // //traer sus modulos
        // $temarios = module::where('certificate_id', $certificate->id)
        //     ->with('topics.sub_Topics')
        //     ->get();


        // // $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        // $backgroundImagePath = asset(Storage::url($certificate->photo_front));
        // $imagePath = public_path(Storage::url($certificate->photo_front));
        // $imageData = base64_encode(file_get_contents($imagePath));
        // $backgroundImageBase64 = 'data:image/jpeg;base64,' . $imageData;

        // //$qr = $this->GenerarQr();

        // // $firmas_all = firm::where('certificate_id', $certificate->id)->get();
        $html = view('boleta_masivo', compact('saleDetails', 'settings', 'user', 'code', 'sale'))->render();
        // //  dd($html);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $output = $pdf->output();
        $name = $user->name . '-' . $user->last_name;

        $codigoU = $code . '-' . $sale->id;
        $publicPath = public_path('Boletas/' . $name . '-' . $codigoU .  '.pdf');
        //Verifica si el directorio existe y créalo si no es así
        $pdfDir = dirname($publicPath);
        if (!file_exists($pdfDir)) {
            mkdir($pdfDir, 0755, true);
        }
        file_put_contents($publicPath, $output);
        return $pdf->stream('Boleta.pdf', ['Attachment' => false]);
    }
}