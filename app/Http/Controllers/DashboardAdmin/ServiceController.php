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
    public function edit($slug)
    {
        $service = service::where('slug', $slug)->firstOrFail();
        return view('dashboardAdmin.service.edit', compact('service'));
    }
}
