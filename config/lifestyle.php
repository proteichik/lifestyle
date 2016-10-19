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
];