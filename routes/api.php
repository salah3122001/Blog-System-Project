<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('api:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    Route::post('/posts/{post}/comments', [CommentApiController::class, 'store']);
    Route::get('/comments/{comment}', [CommentApiController::class, 'show']);
    Route::put('/comments/{comment}', [CommentApiController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentApiController::class, 'destroy']);

  
});
