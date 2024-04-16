<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class HomeController extends Controller
{

    use HasRoles;

    public function index()
    {
        if (Auth::user()) {

            if (!Auth::user()->hasRole('customer')) {
                return view('dashboardAdmin.index');
                // return redirect()->route('dashboard-admin.index');
            } else {
                return view('dashboardUser.index');
                // return redirect()->route('user_area.index');
            }
        }
    }
}
