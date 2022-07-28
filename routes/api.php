<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ContactController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/tag' , TagController::class);
Route::apiResource('/blog' , BlogController::class);
Route::apiResource('/project', ProjectController::class);
Route::apiResource('/contact', ContactController::class);
