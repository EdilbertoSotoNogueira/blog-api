<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/users/create', [UserController::class, 'create']);
Route::get('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function()
{

    Route::get('logout', [UserController::class, 'logout']);

    Route::prefix('posts')->group(function()
    {

        Route::post('', [PostController::class, 'create']);
        Route::get('', [PostController::class, 'get']);

            Route::prefix('{id}')->group(function()
            {

                Route::delete('delete', [PostController::class, 'delete']);
                Route::patch('/update', [PostController::class, 'update']);

            });

        Route::prefix('comments')->group(function()
        {

            Route::get('', [CommentController::class, 'get']);

                Route::prefix('{id}')->group(function()
                {

                    Route::delete('/delete', [CommentController::class, 'delete']);
                    Route::post('', [CommentController::class, 'create']);
                    Route::patch('/update', [CommentController::class, 'update']);


                });

        });

    });
    
});