<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class HomeController extends Controller
{

    use HasRoles;

    public function index()
    {
        if (Auth::user()) {

            if (!Auth::user()->hasRole('customer')) {
                //return view('dashboardAdmin.index');
                return redirect()->route('home.admin.index');
                // return redirect()->route('dashboard-admin.index');
            } else {

                return redirect()->route('home.customer.index');
                //return view('dashboardCustomer.home.index');

                // return redirect()->route('user_area.index');
            }
        }
    }
}
