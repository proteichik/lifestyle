<?php

namespace App;

use App\Helper\TranslitHelper;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{
    
    use Sortable;
    
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public $sortable = ['id',
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = TranslitHelper::getSlug($value);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }


}