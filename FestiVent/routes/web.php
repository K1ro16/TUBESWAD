<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventReqController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\PaymentController;
use App\Exports\CommunitiesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Payment;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('web')->group(function () {
    Route::get('/', [EventReqController::class, 'showHome'])->name('home');
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

Route::get('/admin/promosi', function () {
    $promosi = \App\Models\promosi::all(); // Fetch all promosi
    return view('admin.promosi', compact('promosi'));
});


Route::view('/signup', 'layouts.signup')->name('signup');
Route::view('/signin', 'layouts.signin')->name('signin');

// Route::get('/category', function () {
//     return view('Category');
// });

Route::post('/accounts', [AccountsController::class, 'store'])->name('accounts.store');
Route::post('/accounts/login', [AccountsController::class, 'login'])->name('accounts.login');

Route::get('/communities/create', [CommunityController::class, 'create'])->name('communities.create');
Route::post('/communities/store', [CommunityController::class, 'store'])->name('communities.store');
Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');
// Routes for community edit and update
Route::get('/communities/{community}/edit', [CommunityController::class, 'edit'])->name('communities.edit');
Route::put('/communities/{community}', [CommunityController::class, 'update'])->name('communities.update');
Route::delete('/communities/destroy/{id}', [CommunityController::class, 'destroy'])->name('communities.destroy');
// Route::get('/home', [CommunityController::class, 'home'])->name('home');
// routes/web.php
Route::get('/community/{id}', [CommunityController::class, 'show'])->name('communities.show');

Route::get('/communities/export', [CommunityController::class, 'exportToExcel'])->name('communities.export');


//untuk tombol logout
Route::post('/accounts/logout', [AccountsController::class, 'logout'])->name('accounts.logout');
// Routes for event handling
Route::get('/eventreq', [EventReqController::class, 'index'])->name('eventreq.index');
Route::post('/eventreq', [EventReqController::class, 'store'])->name('eventreq.store');
Route::get('/eventreq/{id}/edit', [EventReqController::class, 'edit'])->name('eventreq.edit');
Route::put('/eventreq/{id}', [EventReqController::class, 'update'])->name('eventreq.update');
Route::delete('/eventreq/{id}', [EventReqController::class, 'destroy'])->name('eventreq.destroy');
Route::get('/eventreq/{id}', [EventReqController::class, 'show'])->name('eventreq.show');
Route::get('/eventreqs/export', [EventReqController::class, 'exportToExcel'])->name('eventreqs.export');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle/{eventreq}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::delete('/wishlist/remove/{eventreq}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::post('/wishlist/groups', [WishlistController::class, 'createGroup'])->name('wishlist.createGroup');
Route::post('/wishlist/{wishlist}/move', [WishlistController::class, 'moveToGroup'])->name('wishlist.moveToGroup');
Route::delete('/wishlist/groups/{group}', [WishlistController::class, 'deleteGroup'])->name('wishlist.deleteGroup');
Route::get('/wishlist/group/{group}/print', [WishlistController::class, 'printGroup'])->name('wishlist.group.print');

Route::get('/tabevent/{id}', function ($id) {
    $event = \App\Models\EventReq::findOrFail($id);
    return view('eventreq.tabevent', compact('event'));
})->name('tabevent.show');
// go to feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::get('/feedback/print', [FeedbackController::class, 'print'])->name('feedback.print');
Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::get('/feedback/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
Route::put('/feedback/{feedback}', [FeedbackController::class, 'update'])->name('feedback.update');
Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
Route::patch('/feedback/{feedback}/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// go to promotion
Route::get('/promosi', [PromosiController::class, 'index'])->name('promosi.index');
Route::get('/promosi/create', [PromosiController::class, 'create'])->name('promosi.create');
Route::post('/promosi', [PromosiController::class, 'store'])->name('promosi.store');
Route::get('/promosi/{promosi}', [PromosiController::class, 'show'])->name('promosi.show');
Route::get('/promosi/{promosi}/edit', [PromosiController::class, 'edit'])->name('promosi.edit');
Route::put('/promosi/{promosi}', [PromosiController::class, 'update'])->name('promosi.update');
Route::delete('/promosi/{promosi}', [PromosiController::class, 'destroy'])->name('promosi.destroy');

Route::get('/category/{category?}', [EventReqController::class, 'showCategory'])->name('category.show');
// go to payment
Route::get('/payment/{eventId?}', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');
Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
