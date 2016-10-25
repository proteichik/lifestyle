<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * У категории множество постов (one to many)
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }


}
