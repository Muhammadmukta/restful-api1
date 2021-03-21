<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AuthController;
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', AuthController::class.'@login');
    Route::post('logout', AuthController::class.'@logout');
    Route::post('refresh', AuthController::class.'@refresh');
    Route::post('me', AuthController::class.'@me');
});

use App\Http\Controllers\User\UserController;
Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
   // ->middleware('auth:api');

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostCommentController;

Route::resource('posts', PostController::class, ['except' => ['create', 'edit']]);
    //->middleware('auth:api');

Route::resource('posts.comments', PostCommentController::class, ['except' => ['create', 'edit']]);

