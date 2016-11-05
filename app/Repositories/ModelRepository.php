<?php

namespace App\Repositories;

use App\Contracts\ObjectRepository;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ModelRepository implements ObjectRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ModelRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public function find($id)
    {
        return $this->getBuilder()->find($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function findOne($id)
    {
        return $this->getBuilder()->findOrFail($id);
    }

    /**
     * @param null $itemPerPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll($itemPerPage = null)
    {
        if (in_array(Sortable::class, class_uses($this->model))) {
            return $this->getBuilder()->sortable()->paginate($itemPerPage);
        }

        return $this->getBuilder()->paginate($itemPerPage);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->model->newQuery();
    }

    /**
     * @param array $order
     * @return array
     */
    public function getSelectList(array $order = array())
    {
        $items = $this->model->all();

        $list = array();
        foreach ($items as $item) {
            $list[$item->id] = $item->__toString();
        }

        return $list;
    }
    
    public function getList(array $order = array())
    {
        $qb = $this->getBuilder();

        if (isset($order['column'])) {
            $qb->orderBy($order['column'],
                (isset($order['direction'])) ? $order['direction'] : 'asc');
        }

        return $qb->get();
    }


}