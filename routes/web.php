<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\BlogController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\Main\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], function () {
    Route::get('/', [BlogController::class, 'index']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('admin.categories.index');

        Route::get('/deleted/categories', [CategoryController::class, 'listOfDeletedCategories'])->name('admin.categories.deleted');

        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');

        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');

        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');

        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

        Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

        Route::post('/{category}', [CategoryController::class, 'restore'])->name('admin.categories.restore');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
