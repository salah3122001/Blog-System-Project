<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        // $this->middleware('auth');
        $this->commentService = $commentService;
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $this->commentService->create($post, $request->validated());
        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
         if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $this->commentService->delete($comment);

          return back()->with('success', 'Comment deleted successfully.');
    }
}
