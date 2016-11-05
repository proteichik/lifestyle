<?php

namespace App\Providers;

use App\Contracts\ObjectRepository;
use App\Http\ViewComposers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'site.posts.list', 'App\Http\ViewComposers\CategoriesComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app
            ->when(CategoriesComposer::class)
            ->needs(ObjectRepository::class)
            ->give(function($app) {
                return $app['Site\CategoryRepository'];
            });
        ;
    }
}
