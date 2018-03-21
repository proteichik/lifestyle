<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Contracts\ObjectRepository;
use App\Http\Controllers\Base\BaseController;
use App\Post;
use App\Services\BaseService;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class PostsController extends BaseController
{
    /**
     * @return Post
     */
    protected function getModel()
    {
        return new Post();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\ViewNotFound
     */
    public function viewPostAction(Request $request, $id)
    {
        $post = $this->objectManager->findOne($id);

        if (!Auth::check()) {
            $post->timestamps = false;
            $post->count_views++;
            $post->save();
        }
        
        return view($this->getView('post'), [
            'post' => $post,      
        ]);
    }

    public function getByCategoryAction(Request $request, $categoryId)
    {
        $objects = $this->objectManager
            ->getBuilder()
            ->where('category_id', '=', $categoryId)
            ->paginate();
        
        return view($this->getView('list'), [
            'objects' => $objects,
        ]);
    }

    public function getByCategoryAndSubcategoryAction(Request $request, $categoryId, $subcategoryId)
    {
        $objects = $this->objectManager
            ->getBuilder()
            ->where('category_id', '=', $categoryId)
            ->where('subcategory_id', '=', $subcategoryId)
            ->paginate();

        return view($this->getView('list'), [
            'objects' => $objects,
        ]);
    }

    public function getByTagAction(Request $request, $slug)
    {
        $objects = $this->objectManager
            ->getBuilder()
            ->join('post_tags', 'post_tags.post_id' , '=', 'posts.id')
            ->join('tags', 'post_tags.tag_id', '=', 'tags.id')
            ->where('tags.slug', '=', $slug)
            ->select('posts.*', 'tags.name', 'tags.slug')
            ->paginate();

        return view($this->getView('list'), [
            'objects' => $objects,
        ]);
    }
}