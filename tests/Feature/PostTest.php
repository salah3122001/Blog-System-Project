<?php

use App\Models\User;

use App\Models\Post;

test('user can create a post', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->postJson('/api/posts', [
        'title' => 'My First Post',
        'content'  => 'This is the content.',
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('posts', ['title' => 'My First Post']);
});
