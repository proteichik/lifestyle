<?php

namespace App;

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
        ];

    /**
     * У постов есть категории (many to one)
     */
    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


}
