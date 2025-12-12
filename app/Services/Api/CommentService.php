<?php

namespace App\Services\Api;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentService
{

    public function store(Post $post, array $data)
    {
        $data['user_id'] = Auth::id(); 
        $data['post_id'] = $post->id;

        return Comment::create($data);
    }


    public function show(Comment $comment)
    {
        return $comment->load('user', 'post');
    }


    public function update(Comment $comment, array $data)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // منع تعديل غير مالك الكومنت
        }

        $comment->update($data);
        return $comment;
    }


    public function delete(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return $comment->delete();
    }
}
