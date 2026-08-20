<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    //Crear categorías base 
    public function run(): void
    {
        $categorias = ['Hardware', 'Software', 'Redes', 'Accesos'];

        foreach ($categorias as $nombre) {
            Category::create(['name' => $nombre]);
        }
    }
}