<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    public function index(){
        return view('dashboardAdmin.firm.index');
    }
}