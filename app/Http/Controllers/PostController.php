<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidPostException;
use App\Exceptions\DatabaseConnectionException;
use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // Display all posts
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            if ($search) {
                $posts = Post::where('title', 'LIKE', "%$search%")->orWhere('content', 'LIKE', "%$search%")->get();
                Log::info('Search query received', ['search' => $search]);

                if ($posts->isEmpty()) {
                    Log::info('No posts found', ['search' => $search]);
                    throw new InvalidPostException("No posts found for: \"$search\"");
                }

                Log::info('Filtered posts count', ['count' => $posts->count()]);
            } else {
                $posts = Post::all();
            }

            return view('posts.index', compact('posts', 'search'));
        }
         catch (\Exception $e) {
            throw new InvalidPostException('Unable to retrieve posts.');
        }
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            Post::create($request->only('title', 'content'));
            Log::info('Post created successfully', ['title' => $request->title]);

            return redirect()->back()->with('success', 'Post created successfully.');
        }
         catch (\Exception $e) {
            Log::error('Post creation failed', ['error' => $e->getMessage()]);
            throw new InvalidPostException('Unable to create post.');
        }
    }

    // Show a specific post by ID
    public function show($id)
    {
        try {

            $post = Post::with('user')->findOrFail($id);

            return view('posts.show', compact('post'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
       
            Log::warning('Post not found', ['id' => $id]);
            throw new InvalidPostException('Post not found.');
        } catch (\Exception $e) {
      
            Log::error('An error occurred while retrieving the post', ['error' => $e->getMessage()]);
            throw new InvalidPostException('An error occurred while retrieving the post.');
        }
    }

}
