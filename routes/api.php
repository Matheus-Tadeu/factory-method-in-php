<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\ButtonTypeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Social Media
Route::post('/postToSocialMedia/{platform}', [SocialMediaController::class, 'store']);

// Button
Route::get('/button', [ButtonTypeController::class, 'index']);
Route::post('/button', [ButtonTypeController::class, 'store']);
