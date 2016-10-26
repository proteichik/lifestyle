<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Base\BaseController;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostsController extends BaseController
{
    protected function getModel()
    {
        return new Post();
    }
}