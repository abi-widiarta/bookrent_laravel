<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'status',
        'cover',
        'description',
    ];

    public function scopeFilter(Builder $query, array $request): void
    {   

        $query->when($request['search'] ?? false, function ( $query, $search) {
            if($search != "") {
                $query->where('title','like','%' . $search . '%')
                        ->orWhere('author','like','%' . $search . '%');
            } else if($search == "") {
                $query->oldest();
            };
        });

        $query->when($request['category'] ?? false, function ( $query, $category) {
            if ($category != 'all') {
                $query->whereHas('categories', function (Builder $query) use($category) {
                            $query->where('category_id', $category);
                        });
            } else if($category == 'all') {
                $query->oldest();
            }
        });
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id')->withPivot('category_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_rent', 'book_id', 'user_id');
    }
}
