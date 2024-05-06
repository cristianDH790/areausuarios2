<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\module;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\certificate;

class ModuleController extends Controller
{
    public  function edit($id)
    {
        $certificate = certificate::where('id', $id)->firstOrFail();


        return view('dashboardAdmin.Certificate.Module.edit', compact('certificate'));
    }
    public function contenido($id)
    {
        return "asdas";
    }
}
