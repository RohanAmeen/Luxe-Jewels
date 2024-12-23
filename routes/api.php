<?php

use App\Http\Controllers\ProductApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;

Route::post('login', [AuthController::class, 'login']);

// Protected route
Route::middleware('auth:api')->group(function () {
    // Other protected routes can go here
    Route::get('/profile', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // Logout route (revoke the access token)
    Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('products', ProductApiController::class);
});
