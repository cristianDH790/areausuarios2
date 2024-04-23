<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.customer.index');
    }
    public function edit($code)
    {
        $user  = User::where('code', $code)->firstOrFail();
        return view('dashboardAdmin.customer.edit', compact('user'));
    }
}
