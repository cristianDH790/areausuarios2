<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'cristian',
            'email' => 'admin@admin.com',
            'last_name' => 'de la cruz huarancca',
            'document' => '73042638',
            'phone' => '987654321',
            'code' => 'cl-73042638',
            'password' => bcrypt('123456789'),
        ])->assignRole('admin');
        User::create([
            'name' => 'wilder',
            'email' => 'luisito_619_@hotmail.com',
            'last_name' => 'de la cruz huarancca',
            'document' => '73042637',
            'phone' => '987654321',
            'code' => 'cl-73042637',
            'password' => bcrypt('123456789'),
        ])->assignRole('customer');
    }
}