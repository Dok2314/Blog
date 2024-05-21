<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\BlogController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\Main\CategoryController;
use App\Http\Controllers\Main\TagController;

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

        Route::group(['prefix' => '{category}'], function () {
            Route::get('/', [CategoryController::class, 'show'])->name('admin.categories.show');
            Route::get('/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

            Route::put('/', [CategoryController::class, 'update'])->name('admin.categories.update');

            Route::delete('/', [CategoryController::class, 'delete'])->name('admin.categories.delete');

            Route::post('/', [CategoryController::class, 'restore'])->name('admin.categories.restore');
        });
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/index', [TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/deleted/categories', [TagController::class, 'listOfDeletedTags'])->name('admin.tags.deleted');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tags.create');

        Route::post('/', [TagController::class, 'store'])->name('admin.tags.store');

        Route::group(['prefix' => '{tag}'], function () {
            Route::get('/', [TagController::class, 'show'])->name('admin.tags.show');
            Route::get('/edit', [TagController::class, 'edit'])->name('admin.tags.edit');

            Route::put('/', [TagController::class, 'update'])->name('admin.tags.update');

            Route::delete('/', [TagController::class, 'delete'])->name('admin.tags.delete');

            Route::post('/', [TagController::class, 'restore'])->name('admin.tags.restore');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
