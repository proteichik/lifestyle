<?php

namespace App\Observers;

use App\Post;
use Request;

class PostObserver
{
    public function loaded(Post $post)
    {
        if (Request::route()->getPrefix() !== '/admin') {
            $post->count_views++;
            $post->save();
        }
    }
}