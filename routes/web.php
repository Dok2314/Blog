<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\BlogController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\Main\CategoryController;
use App\Http\Controllers\Main\TagController;
use App\Http\Controllers\Main\PostController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Main\RoleController;
use App\Http\Controllers\HomeController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
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

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/index', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/deleted/posts', [PostController::class, 'listOfDeletedPosts'])->name('admin.posts.deleted');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');

        Route::post('/', [PostController::class, 'store'])->name('admin.posts.store');

        Route::group(['prefix' => '{post}'], function () {
            Route::get('/', [PostController::class, 'show'])->name('admin.posts.show');
            Route::get('/edit', [PostController::class, 'edit'])->name('admin.posts.edit');

            Route::put('/', [PostController::class, 'update'])->name('admin.posts.update');

            Route::delete('/', [PostController::class, 'delete'])->name('admin.posts.delete');

            Route::post('/', [PostController::class, 'restore'])->name('admin.posts.restore');
        });
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/deleted/users', [UserController::class, 'listOfDeletedUsers'])->name('admin.users.deleted');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');

        Route::post('/', [UserController::class, 'store'])->name('admin.users.store');

        Route::group(['prefix' => '{user}'], function () {
            Route::get('/', [UserController::class, 'show'])->name('admin.users.show');
            Route::get('/edit', [UserController::class, 'edit'])->name('admin.users.edit');

            Route::put('/', [UserController::class, 'update'])->name('admin.users.update');

            Route::delete('/', [UserController::class, 'delete'])->name('admin.users.delete');

            Route::post('/', [UserController::class, 'restore'])->name('admin.users.restore');
        });
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/index', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/deleted/roles', [RoleController::class, 'listOfDeletedRoles'])->name('admin.roles.deleted');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.roles.create');

        Route::post('/', [RoleController::class, 'store'])->name('admin.roles.store');

        Route::delete('mass-delete', [RoleController::class, 'massDelete'])->name('admin.roles.massDelete');
//        Route::delete('mass-restore', [RoleController::class, 'massRestore'])->name('admin.roles.massRestore');

        Route::group(['prefix' => '{role}'], function () {
            Route::get('/', [RoleController::class, 'show'])->name('admin.roles.show');
            Route::get('/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');

            Route::put('/', [RoleController::class, 'update'])->name('admin.roles.update');

            Route::delete('/', [RoleController::class, 'delete'])->name('admin.roles.delete');

            Route::post('/', [RoleController::class, 'restore'])->name('admin.roles.restore');
        });
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
