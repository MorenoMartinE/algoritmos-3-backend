<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Inteface\ICursoService;
use App\Services\CursoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICursoService::class, CursoService::class);    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
