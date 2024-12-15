<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepository;
use App\Actions\ProductActions\CreateProductAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Actions\ProductActions\DeleteProductAction;
class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepository::class , function($app){
            return new ProductRepository();
        });

        $this->app->bind(CreateProductAction::class, function($app){
            return new CreateProductAction($app->make(ProductRepository::class));
        });

        $this->app->bind(UpdateProductAction::class, function($app){
            return new UpdateProductAction($app->make(ProductRepository::class));
        });

        $this->app->bind(DeleteProductAction::class, function($app){
            return new DeleteProductAction($app->make(ProductRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
