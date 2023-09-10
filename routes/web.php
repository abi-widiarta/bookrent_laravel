<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Category;
use Laravel\Socialite\Facades\Socialite;

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
        "totalUsers" => User::all()->count()
    ]);
});

Route::get('/admin/books',function () {
    // $book = Book::find(1);

    // $categories = Book::find(1)->categories()->get();

    return view('Admin.books',["books" => Book::all()]);
});

Route::get('/admin/rent-request',function () {
    return view('Admin.rentRequest');
});

Route::get('/admin/rent-logs',function () {
    return view('Admin.rentLogs');
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

    return redirect('/admin/books');
});

Route::get('/admin/books/edit/{book}',function (Book $book) {
    return view('Admin.booksEdit', ["book" => $book,"categories" => Category::all()]);
});

Route::post('/admin/books/edit/{book}',function (Book $book,Request $request) {
    // dd($request->file('cover'));


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
    return redirect('/admin/books');
});

Route::post('/admin/books/restore/{id}', function ($id) {
    Book::onlyTrashed()->where("id",$id)->restore();
    // $book->restore();
    return redirect('/admin/books/trash');
});

Route::post('/admin/login', [AuthController::class, 'authenticateAdmin']);

Route::post('/admin/logout', [AuthController::class, 'logoutAdmin']);


Route::middleware('auth')->group(function () {
    Route::get('/books', function () {
        return view('Client.books', ["books" => Book::all()]);
    });

    Route::get('/books/show/{book}', function (Book $book) {

        return view('Client.booksShow',["book" => $book]);
    });

    Route::get('/rent-request', function () {
        return view('Client.rentRequest');
    });

    Route::get('/rent-logs', function () {
        return view('Client.rentLog');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

