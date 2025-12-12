<?php

use App\Models\Post;
use App\Models\User;

test('user can add a comment on a post', function () {

    $user = User::factory()->create();
    $post = Post::factory()->create();

    $this->actingAs($user);

    $response = $this->postJson("/api/posts/{$post->id}/comments", [
        'content' => 'Nice post!',
    ]);

    // 🟢 Assertions
    $response->assertStatus(201);

    $this->assertDatabaseHas('comments', [
        'content' => 'Nice post!',
        'user_id' => $user->id,
        'post_id' => $post->id,
    ]);
});
