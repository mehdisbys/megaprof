<?php

namespace App\Providers;

use App\Helpers\SearchAdvert;
use Illuminate\Support\ServiceProvider;

class SearchAdvertServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\SearchAdvertContract', function(){

            return new SearchAdvert();

        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\SearchAdvertContract'];
    }
}
