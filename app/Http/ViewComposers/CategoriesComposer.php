<?php

namespace App\Http\ViewComposers;

use App\Contracts\ObjectRepository;
use Illuminate\View\View;

/**
 * Class CategoriesComposer
 * @package App\Http\ViewComposers
 */
class CategoriesComposer
{
    /**
     * @var ObjectRepository
     */
    protected $categories;

    /**
     * CategoriesComposer constructor.
     * @param ObjectRepository $categories
     */
    public function __construct(ObjectRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories->getList([
            'column' => 'name',
        ]));
    }
}