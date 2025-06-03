<?php 
// routes\web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\OrderController as OrderController;
use App\Http\Controllers\Admin\BorrowRequestController; // Add this import

 
// User Routes
Route::get('/', function () { return view('user.welcome'); })->name('/');
Route::get('/register', function () { return view('user.register'); })->name('register');
Route::get('/login', function () { return view('user.login'); })->name('login');
Route::post('/user-login', [AuthController::class, 'userLogin'])->name('login-form');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('register-form');
Route::post('/user-logout', [AuthController::class, 'userLogout'])->name('user-logout');
Route::get('/books', [UserBookController::class, 'index'])->name('books.index');
Route::get('/news-events', [UserEventController::class, 'index'])->name('news-events');

Route::middleware([CheckUser::class])->group(function () {
    Route::get('/books-media', [UserBookController::class, 'index'])->name('books-media');
    Route::get('/cart', function () { return view('user.cart'); })->name('cart');
    Route::get('/checkout', function () { return view('user.checkout'); })->name('checkout');
    Route::get('/services', function () { return view('user.services'); })->name('services');
    Route::get('/contact', function () { return view('user.contact'); })->name('contact');
    Route::get('/cart/add/{book}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/process', [UserCartController::class, 'process'])->name('cart.process');
    Route::get('/cart/remove/{id}', [UserCartController::class, 'remove'])->name('cart.remove');
    Route::get('/order-list', [OrderController::class, 'viewOrders'])->name('orders.view');
    Route::get('/orders/{id}/qr-download', [OrderController::class, 'downloadQr'])->name('orders.qr.download');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('login');
    Route::get('/register', function () { return view('admin.register'); })->name('register');
    Route::post('/admin-logout', [AdminAuthController::class, 'adminLogout'])->name('logout');
    Route::post('/admin-login', [AdminAuthController::class, 'adminLogin'])->name('login-form');
    Route::post('/admin-register', [AdminAuthController::class, 'adminRegister'])->name('register-form');
    Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::get('/index', function () { return view('admin.index'); })->name('index');
        Route::get('/manage-books', [AdminBookController::class, 'index'])->name('manage-books');
        Route::get('/books', [AdminBookController::class, 'index'])->name('books.index');
        Route::post('/books', [AdminBookController::class, 'store'])->name('books.store');
        Route::delete('/books/{id}', [AdminBookController::class, 'destroy'])->name('books.destroy');
        Route::put('/books/{id}', [AdminBookController::class, 'update'])->name('books.update');
        Route::post('/books/store', [AdminBookController::class, 'store'])->name('books.store');
        
        // Borrow Requests Routes
        Route::get('/borrow-requests', [BorrowRequestController::class, 'index'])->name('borrow-requests');
        Route::post('/orders/{id}/accept', [BorrowRequestController::class, 'acceptOrder'])->name('orders.accept');
        Route::post('/orders/{id}/reject', [BorrowRequestController::class, 'rejectOrder'])->name('orders.reject');
        Route::post('/orders/{id}/returned', [BorrowRequestController::class, 'markAsReturned'])->name('orders.returned');
        
        Route::get('/announcements', [AdminEventController::class, 'index'])->name('announcements');
        Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');
        Route::delete('/events/{id}', [AdminEventController::class, 'destroy'])->name('events.destroy');
        Route::put('/events/{id}', [AdminEventController::class, 'update'])->name('events.update');
        Route::get('/users', [AdminAuthController::class, 'showUsers'])->name('users');
        Route::delete('/users/{user}', [AdminAuthController::class, 'deleteUser'])->name('users.delete');
        Route::post('/users/store', [AdminAuthController::class, 'storeUser'])->name('users.store');
    });
});