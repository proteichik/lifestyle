<?php

namespace App\Repositories\Admin;

use App\Repositories\ModelRepository;

class SubcategoriesRepository extends ModelRepository
{
    public function getBuilder()
    {
        return $this->model->newQuery()->with('category');
    }

}