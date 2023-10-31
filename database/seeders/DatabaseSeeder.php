<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CoursesSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\TimetableSeeder;
use Database\Seeders\HostingTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
         \App\Models\User::factory(10)->create();
        $this->call(CoursesSeeder::class);
        $this->call(TimetableSeeder::class);
        $this->call(FormRegistrationSeeder::class);


        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //      'password' => Hash::make('12345678'),
        //  ]);
    }
}
