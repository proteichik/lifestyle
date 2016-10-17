<?php

return [
    \App\Http\Controllers\Admin\PostsController::class => [
        'item_per_page' => 10,
        'form_routes' => [
            'create' => 'admin.posts.new.save',
            'update' => 'admin.posts.edit.save',
        ],
    ],
];