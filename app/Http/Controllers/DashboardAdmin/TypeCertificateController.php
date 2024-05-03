<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeCertificateController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.type_certificate.index');
    }
    public function edit()
    {
        return view('dashboardAdmin.type_certificate.edit');
    }
}
