<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(9);
        return view('posts.index', [
            'posts'=>$posts
        ]);
    }

    public function show(Post $post)
    {
        $comments = Comment::with('user')->latest()->get();
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
    public function comment(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required',
            'message' => 'required|string|min:5'
        ]);
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        return redirect(route('posts.show', $data['post_id']));
    }

}
