<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost() {
        return view('admin.createPost');
    }

    public function savePost(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:512'],
            'body' => ['required', 'string'],
            'visibility' => ['required', 'string'],
        ]);

        $post = Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'visibility' => $request->visibility,
            'user_id' => Auth::user()->id,
        ]);

        $post->save();

        return redirect('/dashboard')->with('status', 'Post has been created successfully');
    }

    public function editPost(Post $post) {
        return view('admin.editPost')->with([
            'post' => $post
        ]);
    }

    public function updatePost(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:512'],
            'body' => ['required', 'string'],
            'visibility' => ['required', 'string'],
        ]);

        $post = Post::find($request->post_id);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->visibility = $request->visibility;

        $post->update();

        return redirect('/dashboard')->with('status', 'Post has been updated successfully');
    }

    public function deletePost(Request $request) {
        $request->validate([
            'slug' => ['required', 'string']
        ]);

        $post = Post::where('slug', '=', $request->slug)->first();

        $post->delete();

        return redirect('/dashboard')->with('status', 'Post has been deleted successfully');
    }

    public function previewPost(Post $post) {
        return view('post', [
            'post' => $post,
            'author' => $post->author,
            'previous_post' => null,
            'next_post' => null,
            'recent_posts' => null,
        ]);
    }

    public function fetchSinglePost(Post $post) {
        $previous_post = $post::orderBy('id', 'desc')->where('id', '<', $post->id)->limit(1)->first();
        $next_post = $post::where('id', '>', $post->id)->limit(1)->first();
        $recent_posts = Post::where('visibility', '=', 'public')->limit(5)->latest()->get();

        // increment count
        $post->incrementViewCount();

        return view('post', [
            'post' => $post,
            'next_post' => $next_post,
            'previous_post' => $previous_post,
            'author' => $post->author,
            'recent_posts' => $recent_posts,
        ]);
    }

    public function fetchAllPost(Request $request) {
        if(!is_null($request->search)):
            $posts = Post::where([
                ['visibility', '=', 'public'],
                ['title', 'like', '%'.$request->search.'%']
            ])->orderBy('id', 'desc')->Paginate(5)->withQueryString();
        else:
            $posts = Post::where('visibility', '=', 'public')->orderBy('id', 'desc')->Paginate(5);
        endif;

        return view('posts', [
            'posts' => $posts,
            'recent_posts' => Post::where('visibility', '=', 'public')->limit(5)->latest()->get(),
        ]);
    }

    public function adminDashboard() {
        if(Auth::user()->role == 'admin'):
            $posts = Post::latest()->get();
        else:
            $posts = Post::where('user_id', '=', Auth::user()->id)->latest()->get();
        endif;

        return view('admin.dashboard')->with([
            'posts' => $posts,
            'users' => User::latest()->get(),
        ]);
    }
}