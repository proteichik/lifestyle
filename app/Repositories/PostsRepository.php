<?php

namespace App\Repositories;

use App\Post;
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
        return Post::where('slug', $slug)->firstOrFail();
   }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->model->newQuery()->with('category');
    }


}