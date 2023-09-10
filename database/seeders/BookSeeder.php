<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            "title" => "Algoritma Pemrograman",
            "author" => "Rinaldi Munir",
            "status" => "in stock",
            "cover" => "/img/book-img.png",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia explicabo fugiat ullam exercitationem nostrum, illum neque dolorem quia ut odit sunt debitis dolore qui totam inventore porro. Officiis ex repellendus qui unde sunt adipisci delectus cumque eum modi aperiam ipsa, velit neque veniam ad voluptates aspernatur possimus accusamus voluptatem, excepturi eos necessitatibus distinctio. Obcaecati, nisi minima! Atque deserunt aliquam sequi assumenda ad eaque distinctio illo soluta, sapiente autem reprehenderit dicta pariatur quisquam at possimus vero accusantium nesciunt qui praesentium necessitatibus incidunt nobis velit alias. Delectus sint exercitationem pariatur voluptas similique."
        ]);

        Book::create([
            "title" => "Algoritma Pemrograman 2",
            "author" => "Rinaldi Munir",
            "status" => "in stock",
            "cover" => "/img/book-img.png",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia explicabo fugiat ullam exercitationem nostrum, illum neque dolorem quia ut odit sunt debitis dolore qui totam inventore porro. Officiis ex repellendus qui unde sunt adipisci delectus cumque eum modi aperiam ipsa, velit neque veniam ad voluptates aspernatur possimus accusamus voluptatem, excepturi eos necessitatibus distinctio. Obcaecati, nisi minima! Atque deserunt aliquam sequi assumenda ad eaque distinctio illo soluta, sapiente autem reprehenderit dicta pariatur quisquam at possimus vero accusantium nesciunt qui praesentium necessitatibus incidunt nobis velit alias. Delectus sint exercitationem pariatur voluptas similique."
        ]);

        Book::create([
            "title" => "Algoritma Pemrograman 3",
            "author" => "Rinaldi Munir",
            "status" => "in stock",
            "cover" => "/img/book-img.png",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia explicabo fugiat ullam exercitationem nostrum, illum neque dolorem quia ut odit sunt debitis dolore qui totam inventore porro. Officiis ex repellendus qui unde sunt adipisci delectus cumque eum modi aperiam ipsa, velit neque veniam ad voluptates aspernatur possimus accusamus voluptatem, excepturi eos necessitatibus distinctio. Obcaecati, nisi minima! Atque deserunt aliquam sequi assumenda ad eaque distinctio illo soluta, sapiente autem reprehenderit dicta pariatur quisquam at possimus vero accusantium nesciunt qui praesentium necessitatibus incidunt nobis velit alias. Delectus sint exercitationem pariatur voluptas similique."
        ]);

        Book::create([
            "title" => "Algoritma Pemrograman 4",
            "author" => "Rinaldi Munir",
            "status" => "in stock",
            "cover" => "/img/book-img.png",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia explicabo fugiat ullam exercitationem nostrum, illum neque dolorem quia ut odit sunt debitis dolore qui totam inventore porro. Officiis ex repellendus qui unde sunt adipisci delectus cumque eum modi aperiam ipsa, velit neque veniam ad voluptates aspernatur possimus accusamus voluptatem, excepturi eos necessitatibus distinctio. Obcaecati, nisi minima! Atque deserunt aliquam sequi assumenda ad eaque distinctio illo soluta, sapiente autem reprehenderit dicta pariatur quisquam at possimus vero accusantium nesciunt qui praesentium necessitatibus incidunt nobis velit alias. Delectus sint exercitationem pariatur voluptas similique."
        ]);
    }
}
