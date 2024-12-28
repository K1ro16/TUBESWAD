<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CommunityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::view('/signup', 'layouts.signup')->name('signup');
Route::view('/signin', 'layouts.signin')->name('signin');

Route::get('/Category', function () {
    return view('category');
});

Route::post('/accounts', [AccountsController::class, 'store'])->name('accounts.store');
Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');

Route::get('/communities/create', [CommunityController::class, 'create'])->name('communities.create');
Route::post('/communities/store', [CommunityController::class, 'store'])->name('communities.store');
Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');
// Routes for community edit and update
Route::get('/communities/{community}/edit', [CommunityController::class, 'edit'])->name('communities.edit');
Route::put('/communities/{community}', [CommunityController::class, 'update'])->name('communities.update');
Route::delete('/communities/destroy/{id}', [CommunityController::class, 'destroy'])->name('communities.destroy');

Route::get('/home', [CommunityController::class, 'home'])->name('home');
Route::resource('communities', CommunityController::class);