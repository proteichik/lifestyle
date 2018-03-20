<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends BaseController
{
    /**
     * @return Category
     */
    protected function getModel()
    {
        return new Category();
    }

    /**
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StoreCategoryRequest $request)
    {
        return $this->runCreate($request->all());
    }

    /**
     * @param StoreCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(StoreCategoryRequest $request, $id)
    {
        return $this->runUpdate($request->all(), $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function showSubcategoriesAction(Request $request, $id)
    {
        /** @var Category $category */
        $category = $this->objectManager->findOne($id);

       return $category->getSubcategoriesSelectList();
    }

}