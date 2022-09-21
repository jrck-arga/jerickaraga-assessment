<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

//Route for POST API
Route::post("test/add",[TestController::class,'add']);

//Route for GET API that returns all users information
Route::get("test/show",[TestController::class,'show']);

//Route for GET API the returns information by id.
Route::get("test/showById/{id}",[TestController::class,'showById']);