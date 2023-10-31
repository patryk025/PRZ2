<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' =>'Admin Test',
            'email' =>'admin.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $service = User::create([
            'name' =>'Service Test',
            'email' =>'service.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $user = User::create([
            'name' =>'User Test',
            'email' =>'user.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        if (isset($adminRole)){
            $admin->assignRole($adminRole);
        }
        $serviceRole = Role::findByName(config('auth.roles.service'));
        if (isset($serviceRole)){
            $service->assignRole($serviceRole);
        }
        $userRole = Role::findByName(config('auth.roles.user'));
        if (isset($userRole)){
            $user->assignRole($userRole);
        }
        
    }
}
