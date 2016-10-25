<?php

namespace App\Repositories\Admin;

use App\Post;
use App\Repositories\ModelRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Kyslik\ColumnSortable\Sortable;

class PostsRepository extends ModelRepository
{
    /**
     * @param $slug
     * @return Model
     */
   public function findBySlug($slug)
   {
        return $this->getBuilder()->where('slug', $slug)->firstOrFail();
   }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->model->newQuery()->with('category');
    }


}