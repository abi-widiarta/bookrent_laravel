<?php

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookRent;
use App\Models\Category;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');

    Route::get('/admin/login', [AuthController::class, 'admin']);

    Route::get('/auth/google/redirect', [AuthController::class, 'redirect']);
    
    Route::get('/auth/google/callback', [AuthController::class, 'callback']);
});

Route::get('/admin/dashboard',function () {
    return view('Admin.dashboard',
    [
        "totalBooks" => Book::all()->count(),
        "totalUsers" => User::all()->count(),
        "rentedBooks" => Book::where('status','Out Of Stock')->count(),
        "rent_requests" => BookRent::where('status','Waiting Approval')->get()
    ]);
});

Route::get('/admin/books',function () {
    return view('Admin.books',["books" => Book::all()]);
});

Route::get('/admin/rent-request',function () {
    return view('Admin.rentRequest',["rent_requests" => BookRent::where('status','Waiting Approval')->get()]);
});

Route::get('/admin/rent-logs',function () {
    return view('Admin.rentLogs',["rent_logs" => BookRent::where('status','Finished')->orWhere('status','Approved')->latest()->get()]);
});

Route::get('/admin/books/add',function () {
    return view('Admin.booksAdd',["categories" => Category::all()]);
});

Route::post('/admin/books/add',function (Request $request) {
    $imageExtension = $request->file('cover')->getClientOriginalExtension();

    $image_path = $request->file('cover')->storeAs('img', "book-" . Book::all()->count() + 1 . "." . $imageExtension,['disk' => 'public']);
    
    $book = Book::create([
        "title" => $request->title,
        "author" => $request->author,
        "status" => $request->status,
        "cover" => "/uploads\/" . $image_path,
        "description" => $request->description
    ]);

    $book->categories()->sync($request->categories);

    return redirect('/admin/books')->withToastSuccess('Book added successfully!');
});

Route::get('/admin/books/edit/{book}',function (Book $book) {
    return view('Admin.booksEdit', ["book" => $book,"categories" => Category::all()]);
});

Route::post('/admin/books/edit/{book}',function (Book $book,Request $request) {
    if($request->file('cover') != null) {
        $imageExtension = $request->file('cover')->getClientOriginalExtension();
    
        $image_path = $request->file('cover')->storeAs('img', "book-" . Book::all()->count() + 1 . "." . $imageExtension,['disk' => 'public']);
        
        $book->update([
            "title" => $request->title,
            "author" => $request->author,
            "status" => $request->status,
            "cover" => "/uploads\/" . $image_path,
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
});


Route::get('/admin/books/trash',function () {
    return view('Admin.booksTrash', ["books" => Book::onlyTrashed()->get()]);
});

Route::post('/admin/books/trash/{book}', function (Book $book) {
    $book->delete();
    return redirect('/admin/books')->withToastSuccess('Move to trash success!');
});

Route::post('/admin/books/restore/{id}', function ($id) {
    Book::onlyTrashed()->where("id",$id)->restore();

    return redirect('/admin/books/trash');
});

Route::post('/admin/rent-request/accept/{bookRent}', function (BookRent $bookRent,Request $request) {
    $bookRent->status = "Approved";
    $bookRent->rent_date = Carbon::now()->format('Y-m-d');
    $bookRent->return_date = Carbon::now()->addDays(3)->format('Y-m-d');

    $bookRent->book->status = "Out Of Stock";
    $bookRent->save();
    $bookRent->book->save();

    if ($request->from == "dashboard") {
        return redirect('/admin/dashboard')->withToastSuccess('Request approved successfully!');
    } else if ($request->from == "rent-request") {
        return redirect('/admin/rent-request')->withToastSuccess('Request approved successfully!');
    }

});

Route::post('/admin/rent-request/reject/{bookRent}', function (BookRent $bookRent,Request $request) {
    $bookRent->status = "Rejected";
    $bookRent->save();

    if ($request->from == "dashboard") {
        return redirect('/admin/dashboard')->withToastSuccess('Request rejected successfully!');
    } else if ($request->from == "rent-request") {
        return redirect('/admin/rent-request')->withToastSuccess('Request rejected successfully!');
    }
});

Route::post('/admin/rent-logs/return/{bookRent}', function (BookRent $bookRent) {
    $bookRent->actual_return_date = Carbon::now()->format('Y-m-d');
    $bookRent->status = "Finished";
    $bookRent->book->status = "In stock";

    $bookRent->save();
    $bookRent->book->save();

    return redirect('/admin/rent-logs')->withToastSuccess('Book Returned Successfully!');
});

Route::post('/admin/login', [AuthController::class, 'authenticateAdmin']);

Route::post('/admin/logout', [AuthController::class, 'logoutAdmin']);


Route::middleware('auth')->group(function () {
    Route::get('/books', function (Request $request) {  
        $selected_category = null;

        // code to set selected cateogry name and passed to the view dropdown
        if ($request->has('category') && $request->category == "all") {
            $selected_category = "All";
        } else if($request->has('category') && $request->category != "all") {
            $selected_category = Category::where('id',$request->category)->first()->name;
        } 

        return view('Client.books', ["books" => Book::filter(request(['search','category']))->paginate(2)->withQueryString(),"categories" => Category::all(),"selected_category" => $selected_category]);
    });

    Route::get('/books/show/{book}', function (Book $book) {

        return view('Client.booksShow',["book" => $book]);
    });

    Route::get('/rent-request', function () {
        return view('Client.rentRequest',["rent_requests" => BookRent::where('user_id',Auth::user()->id)->where('status', '!=','Finished')->get()]);
    });

    Route::get('/rent-logs', function () {
        return view('Client.rentLog',["rent_logs" => BookRent::where('user_id', Auth::user()->id)->where('status','Finished')->get()]);
    });

    Route::post('/books/rent/{book}', function (Book $book) {
        $rentCount = BookRent::where('user_id',Auth::user()->id)->where('book_id',$book->id)->where('status','Waiting Approval')->get()->count();
        
        if($rentCount != 0) {
            return redirect('/books/show/' . $book->id)->with('toast_error', 'You already request this book!');
        };
        
        $user = User::find(Auth::user()->id);

        $user->books()->attach($book->id);

        return redirect('/rent-request')->withToastSuccess('Request Sent Successfully!');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

