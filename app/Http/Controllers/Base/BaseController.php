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
     * @var array
     */
    protected $views = [];

    /**
     * BaseController constructor.
     * @param Service $objectManager
     */
    public function __construct(Service $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->views = $this->defineViews();
    }

    /**
     * @return array
     */
    protected function defineViews()
    {
        return [

        ];
    }

    /**
     * @param $name
     * @return string
     * @throws ViewNotFound
     */
    protected function getView($name)
    {
        if (!isset($this->views[$name])) {
            throw new ViewNotFound($name, get_class($this));
        }

        return $this->views[$name];
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
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function runCreate(Request $request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        
        $model->save();
        
        return redirect()->route($this->getByConfig('redirects.create'));
    }
}