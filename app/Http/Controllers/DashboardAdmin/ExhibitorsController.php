<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\Models\exhibitor;
use Illuminate\Http\Request;

class ExhibitorsController extends Controller
{



    public function index()
    {
        return view('dashboardAdmin.exhibitor.index');
    }
    public function edit($id)
    {
        $exhibitor = exhibitor::where('id', $id)->firstOrFail();
        return view('dashboardAdmin.exhibitor.edit', compact('exhibitor'));
    }
