<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Categoria::factory(3)->create();
       Curso::factory(10)->create();
    }
}
