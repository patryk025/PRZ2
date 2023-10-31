<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormRegistration;

class FormRegistrationSeeder extends Seeder
{
    public function run()
    {
        FormRegistration::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        FormRegistration::factory(10)->create();
    }
}
