<?php

namespace App\Repositories\Site;

use App\Repositories\ModelRepository;
use Illuminate\Database\Eloquent\Builder;

class PostsRepository extends ModelRepository
{
    /**
     * @return mixed
     */
    public function getBuilder()
    {
        return $this
            ->model
            ->newQuery()
            ->with('category')
            ->with('comments')
            ->where('publish', '=', 1)
            ->orderBy('posts.created_at', 'desc');
    }

}