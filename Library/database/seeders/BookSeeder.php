<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Book;
class BookSeeder extends Seeder
{
    public function run()
    {
        $author1 = Author::where('name', 'Machado de Assis')->first();
        $author2 = Author::where('name', 'Clarice Lispector')->first();

        $publisher1 = Publisher::where('name', 'Companhia das Letras')->first();
        $publisher2 = Publisher::where('name', 'HarperCollins Brasil')->first();

        $category1 = Category::where('name', 'Romance')->first();
        $category2 = Category::where('name', 'Mistério')->first();

        $book1 = Book::create([
            'title' => 'Dom Casmurro',
            'author_id' => $author1->id,
            'publisher_id' => $publisher1->id,
            'published_year' => 1900,
            'images'=> 'Test'
        ]);

        $book1->categories()->attach($category1->id);

        $book2 = Book::create([
            'title' => 'A Hora da Estrela',
            'author_id' => $author2->id,
            'publisher_id' => $publisher2->id,
            'published_year' => 1977
        ]);

        $book2->categories()->attach([$category1->id, $category2->id]);
    }
}
