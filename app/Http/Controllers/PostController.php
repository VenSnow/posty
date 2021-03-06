<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'likes')->latest()->paginate(15);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
           'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'body' => 'required|min:10',
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        if(!$post->ownedBy(auth()->user())) {
            return response(null, 409);
        }

        $post->delete();

        return back();
    }
}
