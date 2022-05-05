<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['guest'], function (){
    Route::get('/', [PostController::class, 'fetchAllPost'])->name('home');
    Route::get('/post/{post:slug}', [PostController::class, 'fetchSinglePost'])->name('post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [PostController::class, 'adminDashboard'])->name('admin');
    Route::get('/dashboard', [PostController::class, 'adminDashboard'])->name('dashboard');

    Route::group(['prefix'=>'/admin'], function () {
        Route::get('/create-post', [PostController::class, 'createPost'])->name('create-post');
        Route::post('/save-post', [PostController::class, 'savePost'])->name('save-post');
        Route::get('/edit-post/{post:slug}', [PostController::class, 'editPost'])->name('edit-post');
        Route::post('/update-post', [PostController::class, 'updatePost'])->name('update-post');
        Route::post('/delete-post', [PostController::class, 'deletePost'])->name('delete-post');
        Route::get('/preview/{post:slug}', [PostController::class, 'previewPost'])->name('preview-post');
    });
});

require __DIR__.'/auth.php';