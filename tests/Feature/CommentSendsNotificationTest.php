<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCommentAdded;

test('adding comment sends a notification to post owner', function () {

    // Fake Notifications
    Notification::fake();

    $postOwner = User::factory()->create();
    $user = User::factory()->create();
    $post = Post::factory()->create([
        'user_id' => $postOwner->id
    ]);

    $this->actingAs($user);

    $this->postJson("/api/posts/{$post->id}/comments", [
        'content' => 'Hello!',
    ]);

    Notification::assertSentTo(
        $postOwner,
        NewCommentAdded::class
    );


});
