<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Public Routes (Không cần đăng nhập)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard sau khi login
|--------------------------------------------------------------------------
*/
Route::get('/user/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('user.dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes (Chỉ dành cho admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [UserController::class, 'getAllUser'])->name('home');
    Route::get('/list-user', [UserController::class, 'getAllUser'])->name('list-user');
    Route::get('/list-product', [ProductController::class, 'getAllProduct'])->name('list-product');
});

/*
|--------------------------------------------------------------------------
| User Routes (Người dùng đăng nhập)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');

    Route::get('/trashed', [ProductController::class, 'trashed'])->name('trashed');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
    Route::delete('/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('forceDelete');

    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});
