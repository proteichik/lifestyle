<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Base\BaseController;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

        $post->timestamps = false;
        $post->count_views++;
        $post->save();
        
        return view($this->getView('post'), [
            'post' => $post,      
        ]);
    }
}