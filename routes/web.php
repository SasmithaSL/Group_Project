<?php use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Middleware\CheckAdmin;

// User Routes
Route::get('/', function () { return view('user.welcome'); })->name('/');
Route::get('/register', function () { return view('user.register'); })->name('register');
Route::get('/login', function () { return view('user.login'); })->name('login');


Route::post('/user-login', [AuthController::class,'userLogin'])->name('login-form');
Route::post('/user-register', [AuthController::class,'userRegister'])->name('register-form');
Route::post('/user-logout', [AuthController::class,'userLogout'])->name('user-logout');

Route::middleware([CheckUser::class])->group(function () {

    Route::get('/books-media', function () { return view('user.books-media'); })->name('books-media');
    Route::get('/news-events', function () { return view('user.news-events'); })->name('news-events');
    Route::get('/cart', function () { return view('user.cart'); })->name('cart');
    Route::get('/checkout', function () { return view('user.checkout'); })->name('checkout');
    Route::get('/services', function () { return view('user.services'); })->name('services');
    Route::get('/contact', function () { return view('user.contact'); })->name('contact');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('login');
    Route::get('/register', function () { return view('admin.register'); })->name('register');
    
    // Define the admin-logout route here
    Route::post('/admin-logout', [AdminAuthController::class, 'adminLogout'])->name('logout');

    // Admin login and registration routes
    Route::post('/admin-login', [AdminAuthController::class, 'adminLogin'])->name('login-form');
    Route::post('/admin-register', [AdminAuthController::class, 'adminRegister'])->name('register-form');

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::get('/index', function () { return view('admin.index'); })->name('index');
        Route::get('/manage-books', function () { return view('admin.manage-books'); })->name('manage-books');
        Route::get('/borrow-requests', function () { return view('admin.borrow-requests'); })->name('borrow-requests');
        Route::get('/announcements', function () { return view('admin.announcements'); })->name('announcements');
        Route::get('/users', [AdminAuthController::class, 'showUsers'])->name('users');
        Route::delete('/users/{user}', [AdminAuthController::class, 'deleteUser'])->name('users.delete');
    });
});
