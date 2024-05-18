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
    public function service_edit($code, $certificate)
    {
        $user  = User::where('code', $code)->firstOrFail();
        $certificate = $user->certificates()->where('id', $certificate)->firstOrFail();
        return view('dashboardAdmin.customer.service_edit', compact('user', 'certificate'));
    }
    public function sale_edit($code, $sale)
    {
        $user  = User::where('code', $code)->firstOrFail();
        $sale = $user->sales()->where('id', $sale)->firstOrFail();
        return view('dashboardAdmin.customer.sale_edit', compact('user', 'sale'));
    }
}