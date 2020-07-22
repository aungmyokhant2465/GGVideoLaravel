<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'],function (){
    Route::get('/dashboard',[
        'uses'=>'UserController@getDashboard',
        'as'=>'welcome'
    ]);

    Route::group(['prefix'=>'category'],function (){
        Route::get('/categories',[
            'uses'=>'CategoryController@getAdd',
            'as'=>'get.category'
        ]);
        Route::post('/add',[
            'uses'=>'CategoryController@postAdd',
            'as'=>'post.new.category'
        ]);
        Route::get('/remove/{category_id}',[
            'uses'=>'CategoryController@getRemove',
            'as'=>'get.remove.category'
        ]);
        Route::post('/edit',[
            'uses'=>'CategoryController@postEdit',
            'as'=>'post.edit.category'
        ]);
    });
    Route::group(['prefix'=>'video'],function (){
        Route::get('/videos',[
            'uses'=>'VideoController@getAdd',
            'as'=>'get.video'
        ]);
        Route::post('/add',[
            'uses'=>'VideoController@postAdd',
            'as'=>'post.add.video'
        ]);
        Route::get('/remove/{video_id}',[
            'uses'=>'VideoController@getRemove',
            'as'=>'get.remove.video'
        ]);
        Route::post('/edit',[
            'uses'=>'VideoController@postEdit',
            'as'=>'post.edit.video'
        ]);
    });
    Route::group(['prefix'=>'auth'],function (){
        Route::get('/register',[
            'uses'=>'UserController@getRegister',
            'as'=>'get.register'
        ]);
        Route::post('/register',[
            'uses'=>'UserController@postRegister',
            'as'=>'post.register'
        ]);
        Route::get('/users',[
            'uses'=>'UserController@getUsers',
            'as'=>'get.users'
        ]);
        Route::get('/remove/{user_id}',[
            'uses'=>'UserController@getRemove',
            'as'=>'get.remove.user'
        ]);
        Route::post('/edit',[
            'uses'=>'UserController@postEdit',
            'as'=>'post.edit.user'
        ]);
        Route::get('/edit/{user_id}',[
            'uses'=>'UserController@getEdit',
            'as'=>'get.edit.user'
        ]);
        Route::get('/logout',[
            'uses'=>'UserController@getLogout',
            'as'=>'get.logout'
        ]);
    });
});
Route::get('/',[
    'uses'=>'UserController@getLogin',
    'as'=>'login'
]);
Route::post('/login',[
    'uses'=>'UserController@postLogin',
    'as'=>'post.login'
]);
Route::get('/img/{image_name}',[
    'uses'=>'VideoController@getImage',
    'as'=>'get.image'
]);


