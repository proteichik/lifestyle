<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Service;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostsController extends BaseController
{
    /**
     * @var BaseService
     */
    protected $categoryService;

    public function __construct(Service $objectManager)
    {
        parent::__construct($objectManager);

        $this->categoryService = app('CategoryService');
    }

    protected function getModel()
    {
        return new Post();
    }

    public function showCreateForm(Request $request)
    {
        $categories = $this->categoryService->getSelectList();

        return view($this->getView('create'), [
            'object' => $this->getModel(),
            'categories' => $categories,
        ]);
    }

    public function createAction(StorePostRequest $request)
    {
        return $this->runCreate($request);
    }

    public function showUpdateForm(Request $request, $id)
    {
        $categories = $this->categoryService->getSelectList();
        $object = $this->objectManager->findOne($id);

        return view($this->getView('update'), [
            'object' => $object,
            'categories' => $categories,
        ]);
    }
    
    public function updateAction(StorePostRequest $request, $id)
    {
        return $this->runUpdate($request, $id);
    }
}