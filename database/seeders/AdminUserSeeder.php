<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin_principal')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@tienda3d.test',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);
    }
}
