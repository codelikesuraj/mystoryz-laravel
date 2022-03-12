<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost() {
        return view('admin.createPost');
    }

    public function savePost(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post = Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);

        $post->save();

        return redirect('/dashboard')->with('status', 'Post has been created successfully');
    }

    public function editPost(Post $post) {
        return view('admin.editPost')->withPost($post);
    }

    public function updatePost(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post = Post::find($request->post_id);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;

        $post->update();

        return redirect('/dashboard')->with('status', 'Post has been updated successfully');
    }
}
