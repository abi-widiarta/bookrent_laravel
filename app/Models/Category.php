<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_category', 'category_id','book_id')->withPivot('category_id');
    }
}
