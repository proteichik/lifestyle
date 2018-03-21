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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function getSubcategoriesArray()
    {
        $subCategoriesList = [];
        /** @var Subcategory $subCategory */
        foreach ($this->subCategories as $subCategory)
        {
            $subCategoriesList[] = [
                'id' => $subCategory->id,
                'name' => $subCategory->name,
            ];

        }

        return $subCategoriesList;
    }

    public function getSubcategoriesSelectList()
    {
        $subCategoriesList = [];
        /** @var Subcategory $subCategory */
        foreach ($this->subCategories as $subCategory)
        {
            $subCategoriesList[$subCategory->id] = $subCategory->name;
        }

        return $subCategoriesList;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }


}
