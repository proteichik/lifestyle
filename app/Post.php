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
