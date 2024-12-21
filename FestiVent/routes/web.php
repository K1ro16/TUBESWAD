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

// Menambahkan rute untuk Requests
Route::get('/eventreq', [EventReqController::class, 'index'])->name('eventreq.index'); // Show event list
Route::get('/eventreq/create', [EventReqController::class, 'create'])->name('eventreq.create'); // Show form to create new event
Route::post('/eventreq', [EventReqController::class, 'store'])->name('eventreq.store'); // Store new event
Route::get('/eventreq/{id}', [EventReqController::class, 'show'])->name('eventreq.show'); // Show event details
Route::get('/eventreq/{id}/edit', [EventReqController::class, 'edit'])->name('eventreq.edit'); // Show edit form for event
Route::put('/eventreq/{id}', [EventReqController::class, 'update'])->name('eventreq.update'); // Update event
Route::delete('/eventreq/{id}', [EventReqController::class, 'destroy'])->name('eventreq.destroy'); // Delete event


