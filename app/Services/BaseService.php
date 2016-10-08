<?php

namespace App\Services;

use App\Contracts\ObjectRepository;
use App\Contracts\Service;
use Illuminate\Database\Eloquent\Model;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Config;

class BaseService implements Service
{    
    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $configPrefix = '';

    /**
     * BaseService constructor.
     * @param ObjectRepository $repository
     */
    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        if (!method_exists($this->repository, $name)) {
            throw new MethodNotFoundException(
                'Method not found', get_class($this->repository), $name
            );
        }
        
        return call_user_func_array([$this->repository, $name], $arguments);
    }

    /**
     * @param Model $object
     * @return void
     */
    public function save(Model $object)
    {
        $object->save();
    }

    /**
     * @param Model $object
     * @return void
     */
    public function remove(Model $object)
    {
        $object->delete();
    }

    /**
     * @param $id
     * @return null|object
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param $id
     * @return object
     */
    public function findOne($id)
    {
        return $this->repository->findOne($id);
    }

    /**
     * @param $itemPerPage
     * @return object
     */
    public function findAll($itemPerPage = null)
    {
        $itemPerPage = (!$itemPerPage) ? $this->getByConfig('item_per_page', null) : $itemPerPage;
        
        return $this->repository->findAll($itemPerPage);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->repository->getBuilder();
    }

    /**
     * @param array $order
     * @return mixed
     */
    public function getSelectList(array $order = array())
    {
        return $this->repository->getSelectList($order);
    }

    /**
     * @return string
     */
    protected function getConfigName()
    {
        return sprintf('%s.%s.%s', 'lifestyle', get_class($this), $this->configPrefix);
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
}