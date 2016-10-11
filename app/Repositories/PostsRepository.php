<?php

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsRepository extends ModelRepository
{
    /**
     * @param $slug
     * @return Model
     */
   public function findBySlug($slug)
   {
        return Post::where('slug', $slug)->firstOrFail();
   }
}