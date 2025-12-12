<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\Api\PostService;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $post = $this->postService->index();
        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $post = $this->postService->store($data);
        return new PostResource($post);
    }

     public function show(Post $post)
    {
        $post = $this->postService->show($post);
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $post = $this->postService->update($post, $data);
        return new PostResource($post);
    }


     public function destroy(Post $post)
    {
        $this->postService->delete($post);
        return response()->json(['message' => 'Post deleted']);
    }
    
}
