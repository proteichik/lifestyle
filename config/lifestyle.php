<?php

return [
    \App\Http\Controllers\Admin\PostsController::class => [
        'item_per_page' => 10,
        'redirects' => [
            'create' => 'admin.posts',
            'update' => 'admin.posts',
        ],
        'views' => [
            'list' => 'admin.posts.list',
            'create' => 'admin.posts.create',
            'update' => 'admin.posts.update',
        ],
    ],
    \App\Http\Controllers\Admin\CategoriesController::class => [
        'item_per_page' => 10,
        'redirects' => [
            'create' => 'admin.categories',
            'update' => 'admin.categories',
        ],
        'views' => [
            'list' => 'admin.categories.list',
            'create' => 'admin.categories.create',
            'update' => 'admin.categories.update',
        ],
    ],
    \App\Http\Controllers\Site\PostsController::class => [
        'item_per_page' => 10,
        'views' => [
            'list' => 'site.posts.list',
            'post' => 'site.posts.view',
        ],
    ],
    \App\Http\Controllers\Site\CommentsController::class => [
        'redirects' => [
            'create' => 'back',
        ],
    ],
];