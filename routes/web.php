<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    return view('Admin.dashboard');
});

Route::get('/admin/books',function () {
    return view('Admin.books');
});

Route::get('/admin/rent-request',function () {
    return view('Admin.rentRequest');
});

Route::get('/admin/rent-logs',function () {
    return view('Admin.rentLogs');
});

Route::get('/admin/books/add',function () {
    return view('Admin.booksAdd');
});

Route::get('/admin/books/trash',function () {
    return view('Admin.booksTrash');
});

Route::post('/admin/login', [AuthController::class, 'authenticateAdmin']);

Route::post('/admin/logout', [AuthController::class, 'logoutAdmin']);


Route::middleware('auth')->group(function () {
    Route::get('/books', function () {
        return view('Client.books');
    });

    Route::get('/books/show', function () {
        return view('Client.booksShow');
    });

    Route::get('/rent-request', function () {
        return view('Client.rentRequest');
    });

    Route::get('/rent-logs', function () {
        return view('Client.rentLog');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

