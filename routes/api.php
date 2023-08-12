<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function () {

    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('update-profile/{user_id}', [AuthController::class, 'updateProfile']);
    Route::get('/users', [AuthController::class, 'getUsers']);
    Route::get('/users/{user_id}', [AuthController::class, 'getUserDetail']);

    Route::get(
        '/my-subscribe-events/{user_id}',
        [AuthController::class, 'mySubscribe']
    );

    Route::get(
        '/my-favorite-events/{user_id}',
        [AuthController::class, 'myFavorite']
    );

    Route::get('/my-events/{user_id}', [EventController::class, 'myEvents']);

    Route::get('/my-old-events/{user_id}', [EventController::class, 'myOldEvents']);

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
    });

    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::post('/', [EventController::class, 'store']);
        Route::get('/{slug}', [EventController::class, 'show']);
        Route::put('/{event}', [EventController::class, 'update']);
    });

    Route::prefix('subscriptions')->group(function () {
        Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
        Route::post('/unsubscribe', [SubscriptionController::class, 'unsubscribe']);
    });

    Route::prefix('favorites')->group(function () {
        Route::post('/subscribe', [FavoriteController::class, 'subscribe']);
        Route::post('/unsubscribe', [FavoriteController::class, 'unsubscribe']);
    });

});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
