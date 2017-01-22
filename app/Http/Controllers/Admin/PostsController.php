<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Service;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
     * @var BaseService
     */
    protected $tagsService;
    /**
     * PostsController constructor.
     * @param Service $objectManager
     */
    public function __construct(Service $objectManager)
    {
        parent::__construct($objectManager);

        $this->categoryService = app('Admin\CategoryService');
        $this->tagsService = app('Admin\TagService');
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
        $tags = $this->tagsService->getSelectList();

        return view($this->getView('create'), [
            'object' => $this->getModel(),
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StorePostRequest $request)
    {
        $model = $this->getModel();
        $response = $this->runCreate($request->all(), $model);
        $model->tags()->sync($request->input('tags', []));
        return $response;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \App\Exceptions\ViewNotFound
     */
    public function showUpdateForm(Request $request, $id)
    {
        $categories = $this->categoryService->getSelectList();
        $tags = $this->tagsService->getSelectList();

        /** @var Post $object */
        $object = $this->objectManager->findOne($id);
        
        return view($this->getView('update'), [
            'object' => $object,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * @param StorePostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function updateAction(StorePostRequest $request, $id)
    {
        /** @var Post $model */
        $model = $this->objectManager->findOne($id);
        $model->tags()->sync($request->input('tags', []));

        return $this->runUpdate($request->all(), $id, $model);
    }

}