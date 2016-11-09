<?php

namespace App\Repositories\Site;

use App\Repositories\ModelRepository;

class PostsRepository extends ModelRepository
{
    /**
     * @return $this
     */
    public function getBuilder()
    {
        return $this
            ->model
            ->newQuery()
            ->with('category')
            ->with('comments')
            ->where('publish', '=', 1)
            ->orderBy('created_at', 'desc');
    }

}