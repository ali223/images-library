<?php

use Illuminate\Http\Request;

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

Route::get('/images', 'Api\ActiveImagesController@index');
Route::delete('/images/{image}', 'Api\ActiveImagesController@destroy');

Route::get('/deletedimages', 'Api\DeletedImagesController@index');
Route::patch('/deletedimages/{id}', 'Api\DeletedImagesController@restore');