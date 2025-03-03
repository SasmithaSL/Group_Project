<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\User\BookController as UserBookController;
 

// User Routes
Route::get('/', function () { return view('user.welcome'); })->name('/');
Route::get('/register', function () { return view('user.register'); })->name('register');
Route::get('/login', function () { return view('user.login'); })->name('login');
Route::post('/user-login', [AuthController::class, 'userLogin'])->name('login-form');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('register-form');
Route::post('/user-logout', [AuthController::class, 'userLogout'])->name('user-logout');
Route::get('/books', [UserBookController::class, 'index'])->name('books.index');

Route::middleware([CheckUser::class])->group(function () {
    Route::get('/books-media', [UserBookController::class, 'index'])->name('books-media'); // Updated to fetch books
    Route::get('/news-events', function () { return view('user.news-events'); })->name('news-events');
    Route::get('/cart', function () { return view('user.cart'); })->name('cart');
    Route::get('/checkout', function () { return view('user.checkout'); })->name('checkout');
    Route::get('/services', function () { return view('user.services'); })->name('services');
    Route::get('/contact', function () { return view('user.contact'); })->name('contact');
});
//test

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('login');
    Route::get('/register', function () { return view('admin.register'); })->name('register');
    Route::post('/admin-logout', [AdminAuthController::class, 'adminLogout'])->name('logout');
    Route::post('/admin-login', [AdminAuthController::class, 'adminLogin'])->name('login-form');
    Route::post('/admin-register', [AdminAuthController::class, 'adminRegister'])->name('register-form');

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::get('/index', function () { return view('admin.index'); })->name('index');
        Route::get('/manage-books', function () { return view('admin.manage-books'); })->name('manage-books');
        Route::post('/books/store', [AdminBookController::class, 'store'])->name('books.store');
        Route::get('/borrow-requests', function () { return view('admin.borrow-requests'); })->name('borrow-requests');
        Route::get('/announcements', function () { return view('admin.announcements'); })->name('announcements');
        Route::get('/users', [AdminAuthController::class, 'showUsers'])->name('users');
        Route::delete('/users/{user}', [AdminAuthController::class, 'deleteUser'])->name('users.delete');
    });
});