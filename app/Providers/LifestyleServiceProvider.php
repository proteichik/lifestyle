<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

abstract class LifestyleServiceProvider extends ServiceProvider
{
 
     /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindContextual();
        $this->bindServices();
        $this->bindPrimitives();
    }
    
    protected function bindServices()
    {

    }

    protected function bindContextual()
    {
        
    }

    protected function bindPrimitives()
    {

    }
}
