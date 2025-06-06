<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("posts",[PostController::class,"index"]);
Route::get("/posts/{id}",[PostController::class,"show"]);
Route::post("posts",[PostController::class,"store"]);
Route::post("/posts/{id}",[PostController::class,"update"]);
Route::delete("/posts/{id}",[PostController::class,"destroy"]);




Route::get("users",[UserController::class,"index"]);
Route::get("/users/{id}",[UserController::class,"show"]);
Route::post("users",[UserController::class,"store"]);
Route::post("/users/{id}",[UserController::class,"update"]);
Route::delete("/users/{id}",[UserController::class,"destroy"]);