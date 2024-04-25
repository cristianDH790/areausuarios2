<?php

namespace App\Http\Controllers\DashboardAdmin;


use App\Http\Controllers\Controller;
use App\Models\type_service;

class TypeServiceController extends Controller
{
    function index()
    {
        return view('dashboardAdmin.type_service.index');
    }
    public function edit($id)
    {
        $type_service = type_service::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.type_service.edit', compact('type_service'));
    }
}