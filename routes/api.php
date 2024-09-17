<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * API ROUTES
 * 
 * Here is where you can register API routes for your application.  These routes are loaded
 * by the RouteServiceProvider within a group which is assigned by the "api" middleware group.
 * 
 */

 // Get the authenticated user's details
 Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 });

// Fetch chat messages (optional - if you want to have a way to fetch messages through API)
Route::middleware('auth:api')->get('/chat/messages', [ChatApiController::class, 'getMessages']);

// Send a message via the API (Optional - if you want to allow sending messages through API)
Route::middleware('auth:api')->get('/chat/send', [ChatApiController::class, 'sendMessage']);

