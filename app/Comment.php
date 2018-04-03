<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Comment extends Model
{
    use Sortable;

    protected $fillable= [
        'author',
        'content',
        'post_id',
        'is_publish',
    ];

    public $sortable = ['id',
        'author',
        'content',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
