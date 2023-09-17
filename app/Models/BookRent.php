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

    public function scopeFilterRentLogsClient(Builder $query, array $request): void
    {   
        $query->when($request['search'] ?? false, function ( $query, $search) {
            $query->whereHas('book', function (Builder $query) use($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    });
        });

        $query->when(!isset($request['category']) , function ( $query, $category) {
            $query->where('status','Approved');
        });

        $query->when($request['category'] ?? false, function ( $query, $category) {
            // dd($category);
            if ($category === "still_rented") {
                $query->where('status','Approved');
            }

            if ($category === "returned_in_time") {
                $query->where('status','Finished')->where('fine','0');
            }

            if ($category === "returned_late") {
                $query->where('status','Finished')->where('fine','!=','0');
            }   
        });

        
    }

    public function scopeFilterRentLogs(Builder $query, array $request): void
    {   
        $query->when($request['search'] ?? false, function ( $query, $search) {
            $query->whereHas('user', function (Builder $query) use($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                    });
        });

        $query->when(!isset($request['category']) , function ( $query, $category) {
            $query->where('status','Approved');
        });

        $query->when($request['category'] ?? false, function ( $query, $category) {
            // dd($category);
            if ($category === "still_rented") {
                $query->where('status','Approved');
            }

            if ($category === "returned_in_time") {
                $query->where('status','Finished')->where('fine','0');
            }

            if ($category === "returned_late") {
                $query->where('status','Finished')->where('fine','!=','0');
            }   
        });

        
    }

    public function scopeFilterRentRequest(Builder $query, array $request): void
    {   
        $query->when($request['search'] ?? false, function ( $query, $search) {
            $query->whereHas('user', function (Builder $query) use($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                    });
        });

        $query->when(!isset($request['category']) , function ( $query, $category) {
            $query->where('status','Waiting Approval');
        });

        $query->when($request['category'] ?? false, function ( $query, $category) {
            // dd($category);
            if ($category === "still_rented") {
                $query->where('status','Approved');
            }

            if ($category === "returned_in_time") {
                $query->where('status','Finished')->where('fine','0');
            }

            if ($category === "returned_late") {
                $query->where('status','Finished')->where('fine','!=','0');
            }   
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
