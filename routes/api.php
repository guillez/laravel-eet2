<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\NoticiaController;
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

//Route::apiResource('v1/noticias', App\Http\Controllers\Api\V1\NoticiaController::class)->middleware('api');

Route::apiResource('noticias', App\Http\Controllers\Api\V1\NoticiaController::class); //->middleware('api');

//Route::apiResource( name: 'noticias', controller: App\Http\Controllers\Api\V1\NoticiaController::class);

