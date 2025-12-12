<?php

namespace App\Services;

use App\Models\Post;


class PostService
{
    public function create(array $data)
    {
        $data['user_id']=auth()->id();
        return Post::create($data);
    }

    public function update(Post $post,array $data)
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}
