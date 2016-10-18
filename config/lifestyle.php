<?php

return [
    \App\Http\Controllers\Admin\PostsController::class => [
        'item_per_page' => 10,
        'redirects' => [
            'create' => 'admin.posts',
        ]
    ],
];