<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventReqController;
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

// Routes for event handling
Route::get('/eventreq', [EventReqController::class, 'index'])->name('eventreq.index');
Route::post('/eventreq', [EventReqController::class, 'store'])->name('eventreq.store');
Route::get('/eventreq/{id}/edit', [EventReqController::class, 'edit'])->name('eventreq.edit');
Route::put('/eventreq/{id}', [EventReqController::class, 'update'])->name('eventreq.update');
Route::delete('/eventreq/{id}', [EventReqController::class, 'destroy'])->name('eventreq.destroy');
Route::get('/eventreq/{id}', [EventReqController::class, 'show'])->name('eventreq.show');
