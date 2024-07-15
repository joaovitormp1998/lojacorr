<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        // Adicione outros seeders aqui, se necessário
    }
}
