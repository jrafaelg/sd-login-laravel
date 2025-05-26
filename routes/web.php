<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/test', function () {
//     return view('home');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/login/index', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/login/new', 'new')->name('login.new');
    Route::post('/login/create', 'create')->name('login.create');
    Route::get('/login/destroy', 'destroy')->name('login.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('can:post.edit');
});
