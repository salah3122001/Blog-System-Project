<?php

test('cannot create post without token', function () {
    $response = $this->postJson('/api/posts', [
        'title' => 'Unauthorized',
        'content'  => 'Who am I?'
    ]);

    $response->assertStatus(401);
});
