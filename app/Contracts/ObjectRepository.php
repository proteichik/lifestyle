<?php

namespace App\Contracts;


interface ObjectRepository
{
    /**
     * Поиск модели по id
     * 
     * @param $id
     * @return null|object
     */
    public function find($id);

    /**
     * Поиск модели по id. Если модель не найдена - кидается Exception
     *
     * @param $id
     * @return object
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * Получить все записи
     *
     * @param null $itemPerPage
     * @return \Illuminate\Database\Eloquent\Model[]
     */
    public function findAll($itemPerPage = null);

    /**
     * Получить query builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder();

    /**
     * Получить массив данных для form select
     *
     * @param array $order
     * @return mixed
     */
    public function getSelectList(array $order = array());
}