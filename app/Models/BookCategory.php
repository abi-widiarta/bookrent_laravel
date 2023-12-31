<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCategory extends Model
{
    use HasFactory;

    protected $table = 'book_category';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
