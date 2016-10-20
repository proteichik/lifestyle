<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){

    Route::get('/', [
        'as' => 'admin.posts',
        'uses' => 'Admin\PostsController@listAction'
    ]);

    Route::get('/posts/new', [
        'as' => 'admin.posts.new',
        'uses' => 'Admin\PostsController@showCreateForm'
    ]);
    Route::post('/posts/new', [
        'as' => 'admin.posts.new.save',
        'uses' => 'Admin\PostsController@createAction'
    ]);

    Route::get('/posts/{id}', [
        'as' => 'admin.posts.update',
        'uses' => 'Admin\PostsController@showUpdateForm'
    ])->where('id', '[0-9]+');
    Route::put('/posts/{id}', [
        'as' => 'admin.posts.update.save',
        'uses' => 'Admin\PostsController@updateAction'
    ])->where('id', '[0-9]+');;
    Route::delete('/posts/{id}/remove', [
        'as' => 'admin.posts.delete',
        'uses' => 'Admin\PostsController@deleteAction'
    ])->where('id', '[0-9]+');;
});