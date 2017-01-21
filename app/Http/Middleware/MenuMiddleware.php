<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('mainMenu', function($menu) {
            $menu->add('Записи')->data(['icon' => 'fa fa-sticky-note-o']);
            $menu->get('zapisi')
                ->add('Список записей', ['route' => 'admin.posts']);
            $menu->get('zapisi')
                ->add('Новая запись', ['route' => 'admin.posts.new']);

            $menu->add('Категории')->data(['icon' => 'fa fa-bars']);
            $menu->get('kategorii')
                ->add('Список категорий', ['route' => 'admin.categories']);
            $menu->get('kategorii')
                ->add('Добавить категорию', ['route' => 'admin.categories.new']);

            $menu->add('Теги')->data(['icon' => 'fa fa-bars']);
            $menu->get('tegi')
                ->add('Список тегов', ['route' => 'admin.tags']);
            $menu->get('tegi')
                ->add('Добавить тег', ['route' => 'admin.tags.new']);

        });

        return $next($request);
    }
}
