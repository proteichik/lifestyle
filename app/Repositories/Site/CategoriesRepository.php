<?php

namespace App\Repositories\Site;

use App\Repositories\ModelRepository;

class CategoriesRepository extends ModelRepository
{
    public function getBuilder()
    {
        return $this
            ->model
            ->newQuery()
            ->with('subcategories');
    }

}