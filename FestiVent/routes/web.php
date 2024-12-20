<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AccountsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');
});




Route::view('/signup', 'layouts.signup')->name('signup');
Route::view('/signin', 'layouts.signin')->name('signin');

Route::get('/Category', function () {
    return view('category');
});

Route::post('/accounts', [AccountsController::class, 'store'])->name('accounts.store');
Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');


//untuk tombol logout
Route::post('/accounts/logout', [AccountsController::class, 'logout'])->name('accounts.logout');

// Menambahkan rute untuk Requests
Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('index');
    Route::get('/create', [RequestController::class, 'create'])->name('create');
    Route::post('/', [RequestController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [RequestController::class, 'edit'])->name('edit');
    Route::put('/{id}', [RequestController::class, 'update'])->name('update');
    Route::delete('/{id}', [RequestController::class, 'destroy'])->name('destroy');
});



