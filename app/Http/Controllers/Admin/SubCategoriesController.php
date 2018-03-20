<?php

namespace App\Http\Controllers\Admin;


use App\Contracts\Service;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Services\BaseService;
use App\Subcategory;
use Illuminate\Http\Request;

class SubCategoriesController extends BaseController
{
    /**
     * @var BaseService
     */
    protected $categoryService;

    /**
     * SubCategoriesController constructor.
     * @param Service $objectManager
     */
    public function __construct(Service $objectManager)
    {
        parent::__construct($objectManager);

        $this->categoryService = app('Admin\CategoryService');
    }


    /**
     * @return Subcategory
     */
    protected function getModel()
    {
        return new Subcategory();
    }

    /**
     * @param StoreSubcategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StoreSubcategoryRequest $request)
    {
        return $this->runCreate($request->all());
    }

    /**
     * @param StoreSubcategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(StoreSubcategoryRequest $request, $id)
    {
        return $this->runUpdate($request->all(), $id);
    }

    public function showCreateForm(Request $request)
    {
        $categories = $this->categoryService->getSelectList();

        return view($this->getView('create'), [
            'object' => $this->getModel(),
            'categories' => $categories,
        ]);
    }

    public function showUpdateForm(Request $request, $id)
    {
        $categories = $this->categoryService->getSelectList();

        /** @var Subcategory $object */
        $object = $this->objectManager->findOne($id);

        return view($this->getView('update'), [
            'object' => $object,
            'categories' => $categories,
        ]);
    }


}