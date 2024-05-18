<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('dashboardadmin.bank.index');
    }
}
