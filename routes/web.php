<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
    route::get('/', [UserController::class, 'getAllUser']);
    route::get('list-user', [UserController::class, 'getAllUser'])->name('list-user');
    route::get('list-product', [ProductController::class, 'getAllProduct'])->name('list-product');

});


Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/trashed', [ProductController::class, 'trashed'])->name('trashed');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
    Route::delete('/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('forceDelete');
});

