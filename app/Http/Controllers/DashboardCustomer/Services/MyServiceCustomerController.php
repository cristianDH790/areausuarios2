<?php

namespace App\Http\Controllers\DashboardCustomer\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyServiceCustomerController extends Controller
{
    public function index()
    {
        return view('dashboardcustomer.my_service.index');
    }
    public function view()
    {
        return view('dashboardcustomer.my_service.view');
    }
    public function video()
    {
        return view('dashboardcustomer.my_service.video');
    }
}
