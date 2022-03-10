<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
            'posts' => Post::latest()->get(),
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
