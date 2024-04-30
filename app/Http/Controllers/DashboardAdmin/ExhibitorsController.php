<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExhibitorsController extends Controller
{

   

    public function index()
    {
        return view('dashboardAdmin.exhibitor.index');
    }
}
