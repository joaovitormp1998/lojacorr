<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $residencial = Category::where('name', 'Residencial')->first();
        $comercial = Category::where('name', 'Comercial')->first();
        $industrial = Category::where('name', 'Industrial')->first();

        Subcategory::create(['name' => 'Apartamento', 'category_id' => $residencial->id]);
        Subcategory::create(['name' => 'Casa', 'category_id' => $residencial->id]);

        Subcategory::create(['name' => 'Escritório', 'category_id' => $comercial->id]);
        Subcategory::create(['name' => 'Loja', 'category_id' => $comercial->id]);

        Subcategory::create(['name' => 'Fábrica', 'category_id' => $industrial->id]);
        Subcategory::create(['name' => 'Armazém', 'category_id' => $industrial->id]);
        // Adicione mais subcategorias conforme necessário
    }
}
