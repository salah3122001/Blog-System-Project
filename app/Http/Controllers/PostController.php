<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    protected $postService;

    public function __construct(PostService $postService)
    {
        // $this->middleware('auth');
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->create($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Action.');
        }
        return view('posts.edit', compact('post'));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        if (auth()->id() != $post->user_id) {
            abort(403);
        }
        $this->postService->update($post, $request->validated());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403);
        }

        $this->postService->delete($post);
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
