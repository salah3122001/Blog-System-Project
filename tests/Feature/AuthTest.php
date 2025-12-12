<?php

use App\Models\User;
// use Illuminate\Support\Facades\Hash;
test('user can login', function () {

    $user = User::factory()->create([
        'password' => Hash::make('123456')
    ]);

    $response = $this->postJson('/api/login', [
        'email'    => $user->email,
        'password' => '123456',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure(['token']);
});
