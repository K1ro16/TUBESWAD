<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventReqController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function () {
    Route::get('/home', [EventReqController::class, 'showHome'])->name('home');
    Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');
});



Route::get('/admin/event', function () {
    $events = \App\Models\EventReq::all(); // Fetch all events
    return view('admin.event', compact('events'));
});

Route::get('/admin/communities', function () {
    $communities = \App\Models\Community::all(); // Fetch all communities
    return view('admin.communities', compact('communities'));
});


Route::view('/signup', 'layouts.signup')->name('signup');
Route::view('/signin', 'layouts.signin')->name('signin');

Route::get('/category', function () {
    return view('Category');
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
<<<<<<< HEAD
=======
// Route::get('/home', [CommunityController::class, 'home'])->name('home');
>>>>>>> main
Route::resource('communities', CommunityController::class);

//untuk tombol logout
Route::post('/accounts/logout', [AccountsController::class, 'logout'])->name('accounts.logout');
// Routes for event handling
Route::get('/eventreq', [EventReqController::class, 'index'])->name('eventreq.index');
Route::post('/eventreq', [EventReqController::class, 'store'])->name('eventreq.store');
Route::get('/eventreq/{id}/edit', [EventReqController::class, 'edit'])->name('eventreq.edit');
Route::put('/eventreq/{id}', [EventReqController::class, 'update'])->name('eventreq.update');
Route::delete('/eventreq/{id}', [EventReqController::class, 'destroy'])->name('eventreq.destroy');
Route::get('/eventreq/{id}', [EventReqController::class, 'show'])->name('eventreq.show');


Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle/{eventreq}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::delete('/wishlist/remove/{eventreq}', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/tabevent/{id}', function ($id) {
    $event = \App\Models\EventReq::findOrFail($id);
    return view('eventreq.tabevent', compact('event'));
})->name('tabevent.show');
// go to feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::get('/feedback/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
Route::put('/feedback/{feedback}', [FeedbackController::class, 'update'])->name('feedback.update');
Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
