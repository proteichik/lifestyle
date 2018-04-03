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
        'subcategory_id',
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
     * У поста может быть подкатегория (many to one)
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Все комментарии
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Опубликованные комментарии
     */
    public function publishedComments()
    {
        return $this->hasMany(Comment::class)->where('comments.is_publish', '=', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


}
