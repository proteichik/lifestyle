<?php

namespace App\Providers;

use App\Category;
use App\Contracts\Service;
use App\Http\Controllers\Site\PostsController;
use App\Post;
use App\Repositories\ModelRepository;
use App\Repositories\Site\PostsRepository;
use App\Services\BaseService;

class LifestyleSiteServiceProvider extends LifestyleServiceProvider
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

    protected function bindServices()
    {
        //Repositories
        $this->app->bind('Site\PostRepository', function () {
            return new PostsRepository(new Post());
        });
        $this->app->bind('Site\CategoryRepository', function () {
            return new ModelRepository(new Category());
        });


        //Services
        $this->app->bind('Site\PostService', function ($app) {
            return new BaseService($app['Site\PostRepository']);
        });
        $this->app->bind('Site\CategoryService', function ($app) {
            return new BaseService($app['Site\CategoryRepository']);
        });
    }

    protected function bindContextual()
    {
        $this->app->when(PostsController::class)
            ->needs(Service::class)
            ->give( function ($app) {
               return $app['Site\PostService']; 
            });
    }


}
