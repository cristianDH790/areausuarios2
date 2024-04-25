<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.service.index');
    }
    public function edit($id)
    {
        $service = service::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.service.edit', compact('service'));
    }
}