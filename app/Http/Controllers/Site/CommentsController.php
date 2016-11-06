<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Database\Eloquent\Model;

class CommentsController extends BaseController
{
    protected function getModel()
    {
        return new Comment();
    }

    public function createAction(StoreCommentRequest $request)
    {
        return $this->runCreate($request->all());
    }
}