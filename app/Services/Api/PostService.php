<?php

namespace App\Services\Api;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    // إرجاع جميع البوستات
    public function index()
    {
        return Post::with('user')->latest()->paginate(10); // جلب مع الـ user
    }

    // إنشاء بوست جدي
    public function store(array $data)
    {
        $data['user_id'] = Auth::id(); 
        return Post::create($data);
    }

    
    public function show(Post $post)
    {
        return $post->load('user', 'comments'); 
    }

    
    public function update(Post $post, array $data)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); 
        }

        $post->update($data);
        return $post;
    }

    
    public function delete(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return $post->delete();
    }
}
