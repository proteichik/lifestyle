<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\BaseController;

class PostsController extends BaseController
{
    protected function defineViews()
    {
        return [
            'list' => 'admin.posts.list',
        ];
    }

}