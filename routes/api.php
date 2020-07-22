<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/videos',[
    'uses'=>'APIController@getVideos'
]);

Route::get('/video/{id}',[
    'uses'=>'APIController@getVideo'
]);

Route::get('/categories',[
    'uses'=>'APIController@getCategories'
]);

Route::get('/images/{image_name}',[
    'uses'=>'APIController@getImages'
]);
Route::get('/videos/{id}/by/category',[
    'uses'=>'APIController@getVideoByCat'
]);