<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookRent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    // CLIENT

    public function clientBooks(Request $request)
    {
        $selected_category = null;

        // code to set selected cateogry name and passed to the view dropdown
        if ($request->has('category') && $request->category == "all") {
            $selected_category = "All";
        } else if($request->has('category') && $request->category != "all") {
            $selected_category = Category::where('id',$request->category)->first()->name;
        } 

        return view('Client.books', ["books" => Book::filter(request(['search','category']))->paginate(8)->withQueryString(),"categories" => Category::all(),"selected_category" => $selected_category]);
    }

    public function clientShow(Book $book) {
        return view('Client.booksShow',["book" => $book]);
    }

    public function clientRent(Book $book) {
        $stillRequest = BookRent::where('user_id',Auth::user()->id)->where('book_id',$book->id)->where('status','Waiting Approval')->get()->count();
        $stillRent = BookRent::where('user_id',Auth::user()->id)->where('status','Approved')->get()->count();
        $rentCount = BookRent::where('user_id',Auth::user()->id)->where('status','Waiting Approval')->get()->count();

        if($stillRequest != 0) {
            return redirect('/books/show/' . $book->id)->with('toast_error', 'You already request this book!');
        };

        if($stillRent + $rentCount >= 3) {
            return redirect('/books/show/' . $book->id)->with('toast_error', 'You reach maximum total rent and rent request of 3!');
        };

        // if($rentCount >= 3) {
        //     return redirect('/books/show/' . $book->id)->with('toast_error', 'You reach maximum rent request of 3!');
        // };



        if($book->status == "Out Of Stock") {
            return redirect('/books/show/' . $book->id)->with('toast_error', 'This book is currently out of stock!');
        }

        if($book->status == "Reserved") {
            return redirect('/books/show/' . $book->id)->with('toast_error', 'This book is currently reserved!');
        }

        $book->status = "Reserved";
        $book->save();
        
        $user = User::find(Auth::user()->id);
        $user->books()->attach($book->id);

        return redirect('/rent-request')->withToastSuccess('Request Sent Successfully!');
    }

    // ADMIN

    public function adminBooks(Request $request) {
        $selected_category = null;

        // code to set selected cateogry name and passed to the view dropdown
        if ($request->has('category') && $request->category == "all") {
            $selected_category = "All";
        } else if($request->has('category') && $request->category != "all") {
            $selected_category = Category::where('id',$request->category)->first()->name;
        } 


        return view('Admin.books',["books" => Book::with(['categories'])->filter(request(['search','category']))->orderBy('id', 'desc')->paginate(10)->withQueryString(),"categories" => Category::all(),"selected_category" => $selected_category]);
    }

    public function adminBookCreate() {
        return view('Admin.booksAdd',["categories" => Category::all()]);
    }

    public function adminBookStore(Request $request) {
        $imageExtension = $request->file('cover')->getClientOriginalExtension();
    
        $image_path = $request->file('cover')->storeAs('img', "book-" . Book::latest()->first()->id + 1 . "." . $imageExtension,['disk' => 'public']);
        
        $book = Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "status" => $request->status,
            "cover" => "/uploads/" . $image_path,
            "description" => $request->description
        ]);
    
        $book->categories()->sync($request->categories);
    
        return redirect('/admin/books')->withToastSuccess('Book added successfully!');
    }

    public function adminBookEdit(Book $book) {
        return view('Admin.booksEdit', ["book" => $book,"categories" => Category::all()]);
    }

    public function adminBookUpdate(Book $book,Request $request) {
        if($request->file('cover') != null) {
            $imageExtension = $request->file('cover')->getClientOriginalExtension();
        
            $image_path = $request->file('cover')->storeAs('img', "book-" . $book->id . "." . $imageExtension,['disk' => 'public']);
            
            $book->update([
                "title" => $request->title,
                "author" => $request->author,
                "status" => $request->status,
                "cover" => "/uploads/" . $image_path,
                "description" => $request->description
            ]);
        } else {
            $book->update([
                "title" => $request->title,
                "author" => $request->author,
                "status" => $request->status,
                "description" => $request->description
            ]);
        }
        return redirect('/admin/books');
    }

    public function adminBookTrash() {
        return view('Admin.booksTrash', ["books" => Book::onlyTrashed()->get(),"categories" => Category::all()]);
    }

    public function adminBookSoftDelete(Book $book) {
        $book->delete();
        return redirect('/admin/books')->withToastSuccess('Move to trash success!');
    }

    public function adminBookRestore($id) {
        Book::onlyTrashed()->where("id",$id)->restore();
    
        return redirect('/admin/books/trash');
    }
}
