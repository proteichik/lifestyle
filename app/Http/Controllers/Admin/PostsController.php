<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Service;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class PostsController
 * @package App\Http\Controllers\Admin
 */
class PostsController extends BaseController
{
    /**
     * @var BaseService
     */
    protected $categoryService;

    /**
     * PostsController constructor.
     * @param Service $objectManager
     */
    public function __construct(Service $objectManager)
    {
        parent::__construct($objectManager);

        $this->categoryService = app('CategoryService');
    }

    /**
     * @return Post
     */
    protected function getModel()
    {
        return new Post();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\ViewNotFound
     */
    public function showCreateForm(Request $request)
    {
        $categories = $this->categoryService->getSelectList();

        return view($this->getView('create'), [
            'object' => $this->getModel(),
            'categories' => $categories,
        ]);
    }

    /**
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StorePostRequest $request)
    {
        return $this->runCreate($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\ViewNotFound
     */
    public function showUpdateForm(Request $request, $id)
    {
        $categories = $this->categoryService->getSelectList();
        $object = $this->objectManager->findOne($id);

        return view($this->getView('update'), [
            'object' => $object,
            'categories' => $categories,
        ]);
    }

    /**
     * @param StorePostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(StorePostRequest $request, $id)
    {
        return $this->runUpdate($request, $id);
    }


}