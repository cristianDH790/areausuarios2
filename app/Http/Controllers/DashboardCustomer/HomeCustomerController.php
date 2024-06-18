<?php

namespace App\Http\Controllers\DashboardCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeCustomerController extends Controller
{
    //
    public function index()
    {
        return view('dashboardCustomer.home.index');
    }
}