<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Ficção']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Aventura']);
        Category::create(['name' => 'Mistério']);
        Category::create(['name' => 'Fantasia']);
    }
}
