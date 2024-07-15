<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Residencial']);
        Category::create(['name' => 'Comercial']);
        Category::create(['name' => 'Industrial']);
        // Adicione mais categorias conforme necessário
    }
}
