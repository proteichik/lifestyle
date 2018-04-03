<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Contracts\Service;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Post;
use App\Repositories\Admin\CommentsRepository;
use App\Repositories\Admin\SubcategoriesRepository;
use App\Repositories\ModelRepository;
use App\Repositories\Admin\PostsRepository;
use App\Services\BaseService;
use App\Subcategory;
use App\Tag;

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
        $this->app->bind('Admin\TagRepository', function () {
            return new ModelRepository(new Tag());
        });
        $this->app->bind('Admin\SubcategoryRepository', function(){
            return new SubcategoriesRepository(new Subcategory());
        });
        $this->app->bind('Admin\CommentRepository', function(){
            return new CommentsRepository(new Comment());
        });


        //Services
        $this->app->bind('Admin\PostService', function ($app) {
            return new BaseService($app['Admin\PostRepository']);
        });
        $this->app->bind('Admin\CategoryService', function ($app) {
            return new BaseService($app['Admin\CategoryRepository']);
        });
        $this->app->bind('Admin\TagService', function ($app) {
            return new BaseService($app['Admin\TagRepository']);
        });
        $this->app->bind('Admin\SubcategoryService', function($app){
            return new BaseService($app['Admin\SubcategoryRepository']);
        });
        $this->app->bind('Admin\CommentService', function($app){
            return new BaseService($app['Admin\CommentRepository']);
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

        $this->app
            ->when(TagsController::class)
            ->needs(Service::class)
            ->give(function ($app) {
                return $app['Admin\TagService'];
            });

        $this->app
            ->when(SubCategoriesController::class)
            ->needs(Service::class)
            ->give(function($app){
                return $app['Admin\SubcategoryService'];
            });

        $this->app
            ->when(CommentsController::class)
            ->needs(Service::class)
            ->give(function($app){
                return $app['Admin\CommentService'];
            });
    }
}
