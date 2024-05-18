<?php

namespace App\Http\Controllers\DashboardAdmin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.roles.index');
    }
    public function edit($role_id)
    {
        $role = Role::find($role_id);


        return view('dashboardAdmin.roles.edit', compact('role'));
    }
}
