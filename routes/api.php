<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/users/create', [UserController::class, 'create']);
Route::get('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function()
{

    Route::prefix('posts')->group(function()
    {

        Route::post('', [PostController::class, 'create']);
        Route::get('', [PostController::class, 'get']);
        Route::get('/comment', [CommentController::class, 'get']);

        Route::prefix('/{id}')->group(function()
        {   

            Route::post('/comment', [CommentController::class, 'create']);
            Route::patch('/update', [PostController::class, 'update']);
            
        });

    });
    
});