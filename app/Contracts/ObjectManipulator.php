<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ObjectManipulator
{
    /**
     * Сохранение модели
     *
     * @param Model $object
     * @return void
     */
    public function save(Model $object);

    /**
     * Удаление модели
     *
     * @param Model $object
     * @return mixed
     */
    public function remove(Model $object);
}