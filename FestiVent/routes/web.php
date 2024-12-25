<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::view('/signup', 'layouts.signup')->name('signup');
Route::view('/signin', 'layouts.signin')->name('signin');

Route::get('/Category', function () {
    return view('EVENT.Category');
});

Route::get('/tabevent', function () {
    return view('EVENT.tabevent');
});

Route::post('/accounts', [AccountsController::class, 'store'])->name('accounts.store');
Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');



