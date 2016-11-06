<?php

namespace App\Http\ViewComposers;

use App\Contracts\ObjectRepository;
use Illuminate\View\View;

/**
 * Class CommentsComposer
 * @package App\Http\ViewComposers
 */
class CommentsComposer
{
    /**
     * @var ObjectRepository
     */
    protected $comments;

    /**
     * CommentsComposer constructor.
     * @param ObjectRepository $comments
     */
    public function __construct(ObjectRepository $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('comments', $this->comments->getList([
            'column' => 'created_at',
        ]));
    }
}