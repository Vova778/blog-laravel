<?php

use App\Http\Controllers\ArticleController;
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


Auth::routes();

Route::resource('articles', ArticleController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('articles.comments', CommentController::class)->only('store', 'update', 'destroy');

    Route::resource('admin/articles', ArticleController::class)->except(['index', 'show']);

    Route::get('admin/articles', [ArticleController::class, 'adminIndex'])->name('admin.dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
