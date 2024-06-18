<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
}