<?php

use Illuminate\Http\Request;

use App\Http\Resources\User as UserResource;

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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::apiResource('media' , 'MediaController');
Route::apiResource('gallery', 'GalleryController');
Route::apiResource('screen', 'ScreenController');

Route::middleware('auth:api')->group(function () {
	Route::get('/user', function (Request $request) {
    	return new UserResource($request->user());
	});
});