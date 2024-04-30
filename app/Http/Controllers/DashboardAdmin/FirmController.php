<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;

use App\Models\firm;

use Illuminate\Http\Request;

class FirmController extends Controller
{

    public function index()
    {
        return view('dashboardAdmin.firm.index');
    }
    public function edit($id)
    {
        $firm = firm::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.firm.edit', compact('firm'));
    }
}

