<?php

namespace App\Repositories\Admin;

use App\Repositories\ModelRepository;
use Illuminate\Database\Eloquent\Builder;

class CommentsRepository extends ModelRepository
{
    /**
     * @return Builder
     */
    public function getBuilder()
    {
        return $this->model
            ->newQuery()
            ->with('post')
            ->where('is_publish', '=', false);
    }

}