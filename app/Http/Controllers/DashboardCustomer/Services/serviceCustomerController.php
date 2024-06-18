<?php

namespace App\Http\Controllers\DashboardCustomer\Services;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class serviceCustomerController extends Controller
{
    public function index()
    {
        return view('dashboardcustomer.service.index');
    }
    public function view($slug)
    {
        $service = service::where('slug', $slug)->first();
        return view('dashboardcustomer.service.view', compact('service'));
    }
}