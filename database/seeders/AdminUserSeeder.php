<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Verifica si ya existe un usuario admin
        $adminExists = DB::table('users')->where('email', 'admin@example.com')->exists();

        if (!$adminExists) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // Hashea la contraseña
                'phone' => '3134304238',
                'gender' => 'masculino',
                'id_rol' => 1, // Asegúrate de que este rol existe en la tabla roles
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
