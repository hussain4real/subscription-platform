<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
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
//
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route for getting all posts
Route::get('/posts', [PostController::class,'index']);

// Route for getting all subscriptions
Route::get('/subscriptions', [SubscriptionController::class,'index']);
//route for creating a post for a website
Route::post('/websites/{websiteId}/posts', [WebsiteController::class,'createPost']);

// Subscribe a user to a website
Route::post('/websites/{websiteId}/subscription', [SubscriptionController::class,'subscribe']);
