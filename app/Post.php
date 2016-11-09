<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use Sortable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'front_picture',
        'publish'
    ];

    public $sortable = ['id',
        'title',
        'created_at',
        'category_id',
        'count_views',
        ];

    /**
     * У постов есть категории (many to one)
     */
    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    /**
     * У поста есть комментарии (one to many)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


}
