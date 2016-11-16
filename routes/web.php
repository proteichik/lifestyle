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
    return redirect()->route('site.posts');
});

Route::group(['prefix' => 'admin'], function(){
    
    /**
     * POSTS
     */
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
    ])->where('id', '[0-9]+');
    
    Route::delete('/posts/{id}/remove', [
        'as' => 'admin.posts.delete',
        'uses' => 'Admin\PostsController@deleteAction'
    ])->where('id', '[0-9]+');


    /**
     * CATEGORIES
     */
    Route::get('/categories', [
        'as' => 'admin.categories',
        'uses' => 'Admin\CategoriesController@listAction'
    ]);

    Route::get('/categories/new', [
        'as' => 'admin.categories.new',
        'uses' => 'Admin\CategoriesController@showCreateForm'
    ]);
    Route::post('/categories/new', [
        'as' => 'admin.categories.new.save',
        'uses' => 'Admin\CategoriesController@createAction'
    ]);

    Route::get('/categories/{id}', [
        'as' => 'admin.categories.update',
        'uses' => 'Admin\CategoriesController@showUpdateForm'
    ])->where('id', '[0-9]+');
    Route::put('/categories/{id}', [
        'as' => 'admin.categories.update.save',
        'uses' => 'Admin\CategoriesController@updateAction'
    ])->where('id', '[0-9]+');

    Route::delete('/categories/{id}/remove', [
        'as' => 'admin.categories.delete',
        'uses' => 'Admin\CategoriesController@deleteAction'
    ])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [
        'as' => 'site.posts',
        'uses' => 'Site\PostsController@listAction'
    ]);
    
    Route::get('/{id}', [
        'as'=> 'site.post',
        'uses' => 'Site\PostsController@viewPostAction',
    ]);

    Route::post('/comment/new', [
        'as' => 'site.comment.new.save',
        'uses' => 'Site\CommentsController@createAction'
    ]);

    Route::get('/category/{categoryId}', [
        'as' => 'site.posts.by_category',
        'uses' => 'Site\PostsController@getByCategoryAction'
    ]);
});