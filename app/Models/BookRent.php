<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookRent extends Model
{
    use HasFactory;

    protected $table = 'book_rent';

    public function scopeFilter(Builder $query, array $request): void
    {   
        $query->when($request['search'] ?? false, function ( $query, $search) {
            $query->whereHas('user', function (Builder $query) use($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                    });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
