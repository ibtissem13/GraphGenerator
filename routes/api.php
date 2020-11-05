<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GraphController;
use App\Http\Controllers\API\NodeController;
use App\Http\Controllers\API\RelationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
	Route::resource('graphs', 'App\Http\Controllers\API\GraphController');
	Route::post('graphs/reshape/{id}', 'App\Http\Controllers\API\GraphController@reshape');
	Route::resource('nodes', 'App\Http\Controllers\API\NodeController');
	Route::resource('relations', 'App\Http\Controllers\API\RelationController');

