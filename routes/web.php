<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/posts');
Auth::routes();

Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('posts.comments', CommentController::class)->only('store', 'update', 'destroy');

    Route::middleware('admin')->group(function () {
        Route::resource('admin/posts', PostController::class)->except(['index', 'show']);
        Route::get('admin/posts', [PostController::class, 'adminIndex'])->name('admin.dashboard');
    });
});
