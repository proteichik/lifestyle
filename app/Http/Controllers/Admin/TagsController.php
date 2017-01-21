<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreTagRequest;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class TagsController extends BaseController
{
    protected function getModel()
    {
        return new Tag();
    }
    
    public function createAction(StoreTagRequest $request)
    {
        return $this->runCreate($request->all());
    }

    public function updateAction(StoreTagRequest $request, $id)
    {
        return $this->runUpdate($request->all(), $id);
    }

}