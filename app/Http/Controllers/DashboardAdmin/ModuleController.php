<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\module;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\certificate;

class ModuleController extends Controller
{
    public  function index($id)
    {
        $certificate = certificate::where('id', $id)->firstOrFail();


        return view('dashboardAdmin.Certificate.Module.index', compact('certificate'));
    }

    public function edit($id, $module)
    {
        $certificate = certificate::where('id', $id)->firstOrFail();
        $module = module::where('id', $module)->firstOrFail();
        return view('dashboardAdmin.Certificate.Module.edit', compact('certificate', 'module'));
    }
    public function certificate_edit($id)
    {
        $certificate = certificate::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.certificate.certificate_generate.certificate-edit', compact('certificate'));
    }
    public function certificte_generate()
    {
        
        return view('dashboardAdmin.certificate.certificate_generate.certificado');
    }
}