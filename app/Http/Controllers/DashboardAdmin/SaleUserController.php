<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sale;

class SaleUserController extends Controller
{
    public function index()
    {
        return view('dashboardadmin.sales_user.index');
    }

    public function validatesale()
    {
        return view('dashboardadmin.sales_user.validate_sale');
    }
    // public function validatesaleedit($code)
    // {
    //     $user = User::where('code', $code)->first();
    //     return view('dashboardadmin.sales_user.validate_sale_edit', compact('user'));
    // }
    public function finances()
    {
        return view('dashboardadmin.sales_user.finances');
    }

    public function Validatefinance()
    {
        return view('dashboardadmin.sales_user.validate_finance');
    }
    public function Validatefinanceedit($sale)
    {
        $sale = sale::where('id', $sale)->firstOrFail();
        return view('dashboardadmin.sales_user.validate_finance_edit', compact('sale'));
    }
}