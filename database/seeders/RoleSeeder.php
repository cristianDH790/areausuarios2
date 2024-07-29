<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    private array $permissions;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'seller']);
        $role3 = Role::create(['name' => 'validator']);
        $role4 = Role::create(['name' => 'customer']);
        $this->createPermissions();
        $role1->givePermissionTo($this->permissions['admin_admins']);
        $role1->givePermissionTo($this->permissions['admin_customers']);
        $role1->givePermissionTo($this->permissions['roles']);
        $role1->givePermissionTo($this->permissions['permissions']);
        $role1->givePermissionTo($this->permissions['users']);
        $role1->givePermissionTo($this->permissions['customers']);
        $role1->givePermissionTo($this->permissions['exhibitors']);
        $role1->givePermissionTo($this->permissions['firms']);
        $role1->givePermissionTo($this->permissions['banks']);
        $role1->givePermissionTo($this->permissions['type_services']);
        $role1->givePermissionTo($this->permissions['services']);
        $role1->givePermissionTo($this->permissions['type_certificates']);
        $role1->givePermissionTo($this->permissions['certificates']);
        $role1->givePermissionTo($this->permissions['sale_users']);
        $role1->givePermissionTo($this->permissions['sale_finances']);
        $role1->givePermissionTo($this->permissions['validate_finances']);
        $role1->givePermissionTo($this->permissions['validate_users']);

        $role2->givePermissionTo($this->permissions['admin_admins']);
        $role2->givePermissionTo($this->permissions['sale_users']);
        $role2->givePermissionTo($this->permissions['customers']);
        $role2->givePermissionTo($this->permissions['sale_finances']);

        $role3->givePermissionTo($this->permissions['admin_admins']);
        $role3->givePermissionTo($this->permissions['validate_users']);
        $role3->givePermissionTo($this->permissions['validate_finances']);

        $role4->givePermissionTo($this->permissions['admin_customers']);
    }
    private function createPermissions(): void
    {
        $this->permissions = [
            'admin_admins'              => Permission::create(['name' => 'admin_admins']),
            'admin_customers'              => Permission::create(['name' => 'admin_customers']),
            'roles'              => Permission::create(['name' => 'roles']),
            'permissions'  => Permission::create(['name' => 'permissions']),
            'users'        => Permission::create(['name' => 'users']),
            'customers'      => Permission::create(['name' => 'customers']),
            'exhibitors'         => Permission::create(['name' => 'exhibitors']),
            'firms'           => Permission::create(['name' => 'firms']),
            'banks' => Permission::create(['name' => 'banks']),
            'type_services'     => Permission::create(['name' => 'type_services']),
            'services'   => Permission::create(['name' => 'services']),
            'type_certificates'          => Permission::create(['name' => 'type_certificates']),
            'certificates'          => Permission::create(['name' => 'certificates']),
            'sale_users'             => Permission::create(['name' => 'sale_users']),
            'sale_finances'             => Permission::create(['name' => 'sale_finances']),
            'validate_finances'             => Permission::create(['name' => 'validate_finances']),
            'validate_users'             => Permission::create(['name' => 'validate_users']),

        ];
    }
}
