<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Base\BaseController;
use Illuminate\Database\Eloquent\Model;

class CategoriesController extends BaseController
{
    protected function getModel()
    {
        return new Category();
    }
    
    
}