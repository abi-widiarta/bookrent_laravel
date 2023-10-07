<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentRequestController;
use App\Models\Wishlist;

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

    Route::post('/admin/login', [AuthController::class, 'authenticateAdmin']);

    Route::post('/admin/logout', [AuthController::class, 'logoutAdmin']);

    Route::get('/comic', [ComicController::class, 'index']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/books',[BookController::class, 'adminBooks']);
    
    Route::get('/admin/rent-request', [RentRequestController::class, 'adminRentRequest']);
    
    Route::get('/admin/rent-logs', [RentLogController::class, 'adminRentLog']);
    
    Route::get('/admin/books/add',[BookController::class, 'adminBookCreate']);
    
    Route::post('/admin/books/add',[BookController::class, 'adminBookStore']);
    
    Route::get('/admin/books/edit/{book}',[BookController::class, 'adminBookEdit']);
    
    Route::post('/admin/books/edit/{book}',[BookController::class, 'adminBookUpdate']);
    
    Route::get('/admin/books/trash', [BookController::class, 'adminBookTrash']);
    
    Route::post('/admin/books/trash/{book}', [BookController::class, 'adminBookSoftDelete']);
    
    Route::post('/admin/books/restore/{id}', [BookController::class, 'adminBookRestore']);
    
    Route::post('/admin/rent-request/accept/{bookRent}', [RentRequestController::class, 'adminRentRequestAccept']);
    
    Route::post('/admin/rent-request/reject/{bookRent}', [RentRequestController::class, 'adminRentRequestReject']);
    
    Route::post('/admin/rent-logs/return/{bookRent}', [RentLogController::class, 'adminRentLogReturn']);

    Route::post('/admin/rent-logs/fine/pay/{bookRent}', [RentLogController::class, 'adminRentLogFinePay']);
});

Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'clientBooks'])->name('books.index');

    Route::get('/books/show/{id}', [BookController::class, 'clientShow'])->name('books.show');

    Route::get('/rent-request', [RentRequestController::class, 'clientRentRequest']);

    Route::get('/rent-logs', [RentLogController::class, 'clientRentLog']);

    Route::post('/books/rent/{book}', [BookController::class, 'clientRent']);

    Route::get('/wishlist', [WishlistController::class, 'index']);

    Route::get('/wishlist/show/{book}', [WishlistController::class, 'show']);

    Route::post('/books/wishlist/{book}', [WishlistController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

