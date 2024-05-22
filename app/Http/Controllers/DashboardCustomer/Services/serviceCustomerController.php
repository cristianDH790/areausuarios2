<?php

namespace App\Http\Controllers\DashboardCustomer\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class serviceCustomerController extends Controller
{
    public function index()
    {
        return view('dashboardcustomer.service.index');
    }
    public function view()
    {
        return view('dashboardcustomer.service.view');
    }
}
