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
        return view('admin.editPost')->withPost($post);
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
}
