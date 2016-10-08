<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
    ];

    /**
     * У постов есть категории (many to one)
     */
    public function category()
    {
        $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


}
