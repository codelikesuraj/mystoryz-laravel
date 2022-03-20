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
    // homepage
    Route::get('/', function () {
        return view('posts', [
            'posts' => Post::where('visibility', '=', 'public')->orderBy('id', 'desc')->Paginate(5),
            'recent_posts' => Post::where('visibility', '=', 'public')->limit(5)->latest()->get(),
        ]);
    })->name('home');

    // single post
    Route::get('/post/{post:slug}', function (Post $post) {
        $previous_post = $post::orderBy('id', 'desc')->where('id', '<', $post->id)->limit(1)->first();
        $next_post = $post::where('id', '>', $post->id)->limit(1)->first();
        $recent_posts = Post::where('visibility', '=', 'public')->limit(5)->latest()->get();

        return view('post', [
            'post' => $post,
            'next_post' => $next_post,
            'previous_post' => $previous_post,
            'author' => $post->author,
            'recent_posts' => $recent_posts,
        ]);
    })->name('post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return redirect('/dashboard');
    })->name('admin');

    Route::get('/dashboard', function () {
        if(Auth::user()->role == 'admin'):
            $posts = Post::latest()->get();
        else:
            $posts = Post::where('user_id', '=', Auth::user()->id)->latest()->get();
        endif;

        return view('admin.dashboard')->with([
            'posts' => $posts,
            'users' => User::latest()->get(),
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
