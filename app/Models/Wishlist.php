<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;

    public function scopeFilter(Builder $query, array $request): void
    {   

        $query->when($request['search'] ?? false, function ( $query, $search) {

            $query->whereHas('book', function (Builder $query) use($search) {
                $query->where('title','like','%' . $search . '%');
            });
            
        });

        $query->when($request['category'] ?? false, function ( $query, $category) {
            if ($category == 'all' ) {
                $query->oldest();
            } else {
                $query->whereHas('book', function (Builder $query) use($category) {
                    $query->whereHas('categories', function ($query) use ($category) {
                        $query->where('category_id', $category);
                    });
                });
            }


        });
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
