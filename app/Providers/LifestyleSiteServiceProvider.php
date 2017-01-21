<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Contracts\Service;
use App\Http\Controllers\Site\CommentsController;
use App\Http\Controllers\Site\PostsController;
use App\Post;
use App\Repositories\ModelRepository;
use App\Repositories\Site\PostsRepository;
use App\Services\BaseService;
use App\Tag;

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
        $this->app->bind('Site\CommentRepository', function () {
            return new ModelRepository(new Comment());
        });
        $this->app->bind('Site\TagRepository', function () {
            return new ModelRepository(new Tag());
        });


        //Services
        $this->app->bind('Site\PostService', function ($app) {
            return new BaseService($app['Site\PostRepository']);
        });
        $this->app->bind('Site\CategoryService', function ($app) {
            return new BaseService($app['Site\CategoryRepository']);
        });
        $this->app->bind('Site\CommentService', function ($app) {
            return new BaseService($app['Site\CommentRepository']);
        });
        $this->app->bind('Site\TagService', function ($app) {
            return new BaseService($app['Site\TagRepository']);
        });
    }

    protected function bindContextual()
    {
        $this->app->when(PostsController::class)
            ->needs(Service::class)
            ->give( function ($app) {
               return $app['Site\PostService']; 
            });
        
        $this->app->when(CommentsController::class)
            ->needs(Service::class)
            ->give( function ($app) {
                return $app['Site\CommentService'];
            });
    }

}
