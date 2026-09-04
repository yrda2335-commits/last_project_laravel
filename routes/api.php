<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;

use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'store']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy']);
    Route::apiResource('projects', ProjectController::class);
});
