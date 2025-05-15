<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    //return view('home');
    return redirect('/home');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [AuthController::class, 'login']);

// Show registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Handle registration
Route::post('/register', [AuthController::class, 'register']);

// Handle logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//Auth::routes();
Route::middleware(['auth'])->group(function () {
    //route resource
    Route::resource('/home', \App\Http\Controllers\HomeController::class);
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/users', \App\Http\Controllers\Modules\Master\UsersController::class);
    Route::resource('/test', \App\Http\Controllers\Modules\TestController::class);
});
