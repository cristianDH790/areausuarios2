<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\type_service;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\type_certificate;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

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
            'document' => '73042634',
            'phone' => '987654321',
            'code' => 'AD-73042634',
            'status' => 'active',
            'password' => bcrypt('123456789'),
        ])->assignRole('admin');
        User::create([
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
            'last_name' => 'vera cruz',
            'document' => '73052634',
            'phone' => '987654321',
            'code' => 'AD-73052634',
            'status' => 'active',
            'password' => bcrypt('123456789'),
        ])->assignRole('seller');
        User::create([
            'name' => 'antony',
            'email' => 'antony@gmail.com',
            'last_name' => 'de la cruz huarancca',
            'document' => '73042624',
            'phone' => '987654321',
            'code' => 'AD-73042624',
            'status' => 'active',
            'password' => bcrypt('123456789'),
        ])->assignRole('validator');
        User::create([
            'name' => 'wilder',
            'email' => 'luisito_619_@hotmail.com',
            'last_name' => 'de la cruz huarancca',
            'document' => '73042637',
            'phone' => '987654321',
            'code' => 'CL-73042637',
            'password' => bcrypt('123456789'),
        ])->assignRole('customer');
        type_service::create([
            'name' => 'Psicologia',
            'code' => 'TS-' . random_int(1000, 9999) . '',
        ]);
        type_service::create([
            'name' => 'Farmacia',
            'code' => 'TS-' . random_int(1000, 9999) . '',
        ]);
        type_service::create([
            'name' => 'Medicina',
            'code' => 'TS-' . random_int(1000, 9999) . '',
        ]);
        $random_number = uniqid();  // Define la variable $random_number
        $name = 'Certificado';      // Define la variable $name

        type_certificate::create([
            'name' => $name,  // Usar la variable $name en el array de datos
            'code' => strtoupper(substr($name, 0, 2)) . "-" . $random_number,  // Usar la variable $random_number en el array de datos
        ]);
        $random_number = uniqid(); // Genera un identificador único basado en la hora actual
        $name = 'Diploma';
        type_certificate::create([

            'name' => $name,
            'code' => strtoupper(substr($name, 0, 2)) . "-" . $random_number,
        ]);
    }
}
