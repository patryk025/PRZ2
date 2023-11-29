<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuń istniejące dane przed dodaniem nowych
        Teacher::truncate();

        // Użyj fabryki do utworzenia 10 nauczycieli (możesz dostosować ilość)
        Teacher::factory(10)->create();
    }
}
