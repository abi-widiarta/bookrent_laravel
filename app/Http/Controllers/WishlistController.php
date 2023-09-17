<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(Request $request) {
        $selected_category = null;

        // code to set selected cateogry name and passed to the view dropdown
        if ($request->has('category') && $request->category == "all") {
            $selected_category = "All";
        } else if($request->has('category') && $request->category != "all") {
            $selected_category = Category::where('id',$request->category)->first()->name;
        } 

        return view('Client.wishlist', ["wishlists" => Wishlist::with(['book','book.categories'])->filter(request(['search','category']))->where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(8)->withQueryString(),"categories" => Category::all(),"selected_category" => $selected_category]);
    }


    public function store(Book $book, Request $request) {
        $user = User::find(Auth::user()->id);
        if($request->page == null) {
            $currentPage = '1';
        } else {
            $currentPage = $request->page;
        }

        if(Wishlist::where('user_id',Auth::user()->id)->where('book_id',$book->id)->count() != 0) {
            $user->booksWishlist()->detach($book->id);

            if($request->wishlistFrom == 'books') {
                return redirect('/books/show/' . $book->id . '?page=' . $currentPage)->with('toast_success','Wishlist removed');
            } else if($request->wishlistFrom == 'wishlist') {
                return redirect('/wishlist/show/' . $book->id)->with('toast_success','Wishlist removed');
            }

        };

        $user->booksWishlist()->attach($book->id);

        if($request->wishlistFrom == 'books') {
            return redirect('/books/show/' . $book->id . '?page=' . $currentPage)->with('toast_success','Wishlist added');
        } else if($request->wishlistFrom == 'wishlist') {
            return redirect('/wishlist/show/' . $book->id)->with('toast_success','Wishlist added');
        }
    }

    public function show(Book $book) {
        $inWishlist = false;

        if(Wishlist::where('user_id',Auth::user()->id)->where('book_id',$book->id)->count() != 0) {
            $inWishlist = true;
        };

        return view('Client.wishlistShow',["book" => $book,"in_wishlist" => $inWishlist]);
    }
}
