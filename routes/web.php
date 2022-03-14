<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
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
    Route::get('/', function () {
        return view('posts', [
            'posts' => Post::where('visibility', '=', 'public')->latest()->get(),
        ]);
    })->name('home');
    Route::get('/post/{post:slug}', function (Post $post) {
        return view('post', [
            'post' => $post,
            'author' => $post->author,
        ]);
    })->name('post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return redirect('/dashboard');
    })->name('admin');

    Route::get('/dashboard', function () {
        return view('admin.dashboard')->with([
            'posts' => Post::where('user_id', '=', Auth::user()->id)->latest()->get(),
        ]);
    })->name('dashboard');
    
    // Post routes
    Route::get('/admin/create-post', [PostController::class, 'createPost'])->name('create-post');
    Route::post('/admin/save-post', [PostController::class, 'savePost'])->name('save-post');
    Route::get('/admin/edit-post/{post:slug}', [PostController::class, 'editPost'])->name('edit-post');
    Route::post('/admin/update-post', [PostController::class, 'updatePost'])->name('update-post');
    Route::post('/admin/delete-post', [PostController::class, 'deletePost'])->name('delete-post');
});

require __DIR__.'/auth.php';
