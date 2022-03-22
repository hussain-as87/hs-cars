<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [LoginController::class, 'loginAction'])->name('api.login');

Route::group(['middleware' => 'auth:sanctum'], function () {

    /**posts api routes */
    Route::apiResource('posts', PostController::class)->names([
        'index' => 'api.posts.index',
        'store' => 'api.posts.store',
    ])->except(['update', 'destroy']);
    Route::put('posts', [PostController::class, 'update'])->name('api.posts.update');
    Route::delete('posts', [PostController::class, 'destroy'])->name('api.posts.destroy');
    /* like */
    Route::post('like', [LikeController::class, 'store'])->name('api.like.update');
    Route::delete('like', [LikeController::class, 'destroy'])->name('api.like.destroy');

    /* profile */
    Route::get('profile', [ProfileController::class, 'index'])->name('api.profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('api.profile.update');

    /* comments routes */
    Route::apiResource('comment', CommentController::class)->names([
        'index' => 'api.posts.index',
        'store' => 'api.comment.store',
    ])->except(['update', 'destroy']);
    Route::put('comment', [CommentController::class, 'update'])->name('api.comment.update');
    Route::delete('comment', [CommentController::class, 'destroy'])->name('api.comment.destroy');
});

Route::get('users', [ProfileController::class, 'fetchUsers']);
