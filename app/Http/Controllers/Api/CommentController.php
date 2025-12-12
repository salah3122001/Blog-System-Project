<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Services\Api\CommentService;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    protected $commentService;


    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }


    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $this->commentService->store($post, $data);

        return new CommentResource($comment);
    }

    
    public function show(Comment $comment)
    {
        $comment = $this->commentService->show($comment);
        return new CommentResource($comment);
    }


    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'content' => 'sometimes|string',
        ]);

        $comment = $this->commentService->update($comment, $data);

        return new CommentResource($comment);
    }


    public function destroy(Comment $comment)
    {
        $this->commentService->delete($comment);

        return response()->json(['message' => 'Comment deleted']);
    }
}
