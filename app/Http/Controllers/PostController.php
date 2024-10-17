<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidPostException;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            Post::create($request->only('title', 'content'));
            Log::info('Post created successfully', ['title' => $request->title]);
            return redirect()->back()->with('success', 'Post created');
        } catch (\Exception $e) {
            Log::error('Post creation failed', ['error' => $e->getMessage()]);
            throw new InvalidPostException('Unable to create post');
        }
    }

    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
        } catch (\Exception $e) {
            throw new InvalidPostException('Post not found');
        }
    }
}
