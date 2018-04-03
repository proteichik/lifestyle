<?php

namespace App\Http\Controllers\Base;

use App\Contracts\Service;
use App\Exceptions\ViewNotFound;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    /**
     * @var Service
     */
    protected $objectManager;

    /**
     * BaseController constructor.
     * @param Service $objectManager
     */
    public function __construct(Service $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param $name
     * @return string
     * @throws ViewNotFound
     */
    protected function getView($name)
    {
        $view = $this->getByConfig('views.' . $name, false);

        if (!$view) {
            throw new ViewNotFound($name, get_class($this));
        }

        return $view;
    }

    /**
     * @return string
     */
    protected function getConfigName()
    {
        return sprintf('%s.%s', 'lifestyle', get_class($this));
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    protected function getByConfig($key, $default = null)
    {
        $key = $this->getConfigName() . '.' . $key;

        return Config::get($key, $default);
    }

    /**
     * @return Model
     */
    abstract protected function getModel();

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws ViewNotFound
     */
    public function listAction(Request $request)
    {
        $objects = $this->objectManager->findAll($this->getByConfig('item_per_page'));

        return view($this->getView('list'), ['objects' => $objects]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws ViewNotFound
     */
    public function showCreateForm(Request $request)
    {
        return view($this->getView('create'), [
            'object' => $this->getModel(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws ViewNotFound
     */
    public function showUpdateForm(Request $request, $id)
    {
        $object = $this->objectManager->findOne($id);
        
        return view($this->getView('update'), [
            'object' => $object,
        ]);
    }

    /**
     * @param array $data
     * @param Model $model
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function runCreate(array $data = array(), Model $model = null)
    {
        $model = (null === $model) ? $this->getModel() : $model;
        $model->fill($data);
        
        $model->save();
        
        $redirect = $this->getByConfig('redirects.create');
        
        return ($redirect === 'back') ? redirect()->back()
            : redirect()->route($this->getByConfig('redirects.create'));
    }

    /**
     * @param array $data
     * @param $id
     * @param Model $model
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function runUpdate(array $data, $id, Model $model = null)
    {
        $model = (null === $model) ? $this->objectManager->findOne($id) : $model;
        
        $model->fill($data);
        $model->save();

        return redirect()->route($this->getByConfig('redirects.update'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $object = $this->objectManager->findOne($id);

        try {
            $this->objectManager->remove($object);
        } catch (\Exception $ex) {
            return ($request->isXmlHttpRequest()) ? response()->json(['result' => $ex->getMessage()], 500)
                : redirect()->back()->withException($ex);
        }

        $httpRedirect = $this->getByConfig('redirects.delete') ?
            redirect()->route($this->getByConfig('redirects.delete')) :
            redirect()->back();

        return ($request->isXmlHttpRequest()) ?
            response()->json(['result' => 'success'], 200) :
            $httpRedirect;
    }
}