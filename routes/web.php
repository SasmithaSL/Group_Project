<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/books-media', function () {
    return view('user.books-media');
})->name('books-media');

Route::get('/news-events', function () {
    return view('user.news-events');
})->name('news-events');

Route::get('/cart', function () {
    return view('user.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');

Route::get('/services', function () {
    return view('user.services');
})->name('services');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/login', function () {
    return view('user.login');
})->name('login');







// Admin routes
Route::get('/index', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/manage-books', function () {
    return view('admin.manage-books');
})->name('admin.manage-books');

Route::get('/borrow-requests', function () {
    return view('admin.borrow-requests');
})->name('admin.borrow-requests');

Route::get('/borrow-requests', function () {
    return view('admin.borrow-requests');
})->name('admin.borrow-requests');

Route::get('/announcements', function () {
    return view('admin.announcements');
})->name('admin.announcements');

Route::get('/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::get('/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/register', function () {
    return view('admin.register');
})->name('admin.register');



