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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
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

    Route::get('/categories/{id}/sub-categories', [
        'as' => 'admin.categories.sub-categories',
        'uses' => 'Admin\CategoriesController@showSubcategoriesAction'
    ])->where('id', '[0-9]+');

    /**
     * SubCategories
     */

    Route::get('/sub-categories', [
        'as' => 'admin.subcategories',
        'uses' => 'Admin\SubCategoriesController@listAction'
    ]);

    Route::get('/sub-categories/new', [
        'as' => 'admin.subcategories.new',
        'uses' => 'Admin\SubCategoriesController@showCreateForm'
    ]);
    Route::post('/sub-categories/new', [
        'as' => 'admin.subcategories.new.save',
        'uses' => 'Admin\SubCategoriesController@createAction'
    ]);

    Route::get('/sub-categories/{id}', [
        'as' => 'admin.subcategories.update',
        'uses' => 'Admin\SubCategoriesController@showUpdateForm'
    ])->where('id', '[0-9]+');
    Route::put('/sub-categories/{id}', [
        'as' => 'admin.subcategories.update.save',
        'uses' => 'Admin\SubCategoriesController@updateAction'
    ])->where('id', '[0-9]+');

    Route::delete('/sub-categories/{id}/remove', [
        'as' => 'admin.subcategories.delete',
        'uses' => 'Admin\SubCategoriesController@deleteAction'
    ])->where('id', '[0-9]+');
    
    /**
     * Tags
     */
    Route::get('/tags', [
        'as' => 'admin.tags',
        'uses' => 'Admin\TagsController@listAction'
    ]);
    Route::get('/tags/new', [
        'as' => 'admin.tags.new',
        'uses' => 'Admin\TagsController@showCreateForm'
    ]);
    Route::post('/tags/new', [
        'as' => 'admin.tags.new.save',
        'uses' => 'Admin\TagsController@createAction'
    ]);

    Route::get('/tags/{id}', [
        'as' => 'admin.tags.update',
        'uses' => 'Admin\TagsController@showUpdateForm'
    ])->where('id', '[0-9]+');
    Route::put('/tags/{id}', [
        'as' => 'admin.tags.update.save',
        'uses' => 'Admin\TagsController@updateAction'
    ])->where('id', '[0-9]+');

    Route::delete('/tags/{id}/remove', [
        'as' => 'admin.tags.delete',
        'uses' => 'Admin\TagsController@deleteAction'
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

    Route::get('/tag/{tagId}', [
        'as' => 'site.posts.by_tag',
        'uses' => 'Site\PostsController@getByTagAction'
    ]);
    
    Route::get('/comment/{id}/delete', [
        'as' => 'site.post.comment.delete',
        'uses' => 'Site\CommentsController@deleteAction'
    ]);
});

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm',
]);
Route::post('login', [
    'uses' => 'Auth\LoginController@login',
]);
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout',
]);
