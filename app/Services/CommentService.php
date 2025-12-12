<?php

namespace App\Services;

use App\Models\Comment;
use App\Notifications\NewCommentAdded;

class CommentService{

    public function create($post,array $data)
    {
        $data['user_id']=auth()->id();
        $data['post_id']=$post->id;

        $comment= Comment::create($data);
        $postAuthor=$post->user;
        $postAuthor->notify(new NewCommentAdded($comment, $post));
        return $comment;
    }

    // public function update(Comment $comment,array $data)
    // {
    //     $comment->update($data);
    //     return $comment;
    // }

    public function delete(Comment $comment)
    {
        return $comment->delete();
    }
}










