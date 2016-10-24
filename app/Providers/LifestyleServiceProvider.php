<?php

namespace App\Providers;

use App\Category;
use App\Contracts\Service;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Observers\PostObserver;
use App\Post;
use App\Repositories\ModelRepository;
use App\Repositories\PostsRepository;
use App\Services\BaseService;
use Illuminate\Support\ServiceProvider;

class LifestyleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindServices();
        $this->bindContextual();
    }

    /**
     * Регистрация сервисов
     */
    protected function bindServices()
    {
        //Repositories
        $this->app->bind('PostRepository', function () {
            return new PostsRepository(new Post());
        });
        $this->app->bind('CategoryRepository', function () {
            return new ModelRepository(new Category());
        });


        //Services
        $this->app->bind('PostService', function ($app) {
            return new BaseService($app['PostRepository']);
        });
        $this->app->bind('CategoryService', function ($app) {
            return new BaseService($app['CategoryRepository']);
        });
    }

    /**
     * Контектсное связывание интерфейсов с реализацией
     */
    protected function bindContextual()
    {
        $this->app
            ->when(PostsController::class)
            ->needs(Service::class)
            ->give(function($app) {
               return $app['PostService'];
            });
        ;

        $this->app
            ->when(CategoriesController::class)
            ->needs(Service::class)
            ->give(function ($app) {
                return $app['CategoryService'];
            });
    }
}
