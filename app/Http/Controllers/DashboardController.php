<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookRent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('Admin.dashboard',
        [
            "totalBooks" => Book::all()->count(),
            "totalUsers" => User::all()->count(),
            "totalFinedRent" => BookRent::where('Fine','!=','0')->count(),
            "rentedBooks" => Book::where('status','Out Of Stock')->count(),
            "rent_requests" => BookRent::where('status','Waiting Approval')->orderBy('id', 'desc')->paginate(5)->withQueryString()
        ]);
    }
}
