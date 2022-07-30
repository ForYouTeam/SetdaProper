<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'super admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        $user = User::create([
            'name' => 'super admin',
            'username' => 'super-admin',
            'password' => Hash::make('NYz=%t*x7ac5#_Z4')
        ]);
        $user->assignRole('super-admin');
    }
}
