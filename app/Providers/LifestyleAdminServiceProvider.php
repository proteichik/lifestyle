<?php

namespace App\Providers;

use App\Category;
use App\Contracts\Service;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Post;
use App\Repositories\ModelRepository;
use App\Repositories\Admin\PostsRepository;
use App\Services\BaseService;

class LifestyleAdminServiceProvider extends LifestyleServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Регистрация сервисов
     */
    protected function bindServices()
    {
        //Repositories
        $this->app->bind('Admin\PostRepository', function () {
            return new PostsRepository(new Post());
        });
        $this->app->bind('Admin\CategoryRepository', function () {
            return new ModelRepository(new Category());
        });


        //Services
        $this->app->bind('Admin\PostService', function ($app) {
            return new BaseService($app['Admin\PostRepository']);
        });
        $this->app->bind('Admin\CategoryService', function ($app) {
            return new BaseService($app['Admin\CategoryRepository']);
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
               return $app['Admin\PostService'];
            });
        ;

        $this->app
            ->when(CategoriesController::class)
            ->needs(Service::class)
            ->give(function ($app) {
                return $app['Admin\CategoryService'];
            });
    }
}
