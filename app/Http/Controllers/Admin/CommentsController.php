<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Base\BaseController;
use Illuminate\Http\Request;

class CommentsController extends BaseController
{
    /**
     * @return string
     */
    protected function getModel()
    {
        return Comment::class;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAction(Request $request, $id)
    {
        $object = $this->objectManager->findOne($id);

        return view($this->getView('view'), [
            'object' => $object,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function approveAction(Request $request, $id)
    {
        try {
            /** @var Comment $object */
            $object = $this->objectManager->findOne($id);
            $object->is_publish = true;
            $object->save();
        } catch (\Exception $ex) {
            return ($request->isXmlHttpRequest()) ? response()->json(['result' => $ex->getMessage()], 500)
                : redirect()->back()->withException($ex);
        }

        return $request->ajax() ? response()->json(['result' => 'success'], 200) : redirect()->route($this->getByConfig('redirects.approve'));
    }
}