<?php

namespace App\Http\Controllers\DashboardCustomer\Services;


use App\Models\module;
use App\Models\service;
use App\Models\setting;
use App\Models\certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Colors\Rgb\Channels\Red;


class MyServiceCustomerController extends Controller
{
    public function index()
    {
        return view('dashboardcustomer.my_service.index');
    }

    public function view($slug)
    {
        $service = service::where('slug', $slug)->first();
        return view('dashboardcustomer.my_service.view', compact('service'));
    }
    public function video($slug, $module_id)
    {
        $service = service::where('slug', $slug)->first();
        $module = module::where('id', $module_id)->first();
        return view('dashboardcustomer.my_service.video', compact('service', 'module'));

    }
}
