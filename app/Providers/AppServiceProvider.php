<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'App\Repositories\ChannelRepositoryInterface',
            'App\Repositories\Eloquents\ChannelRepository'
        );
     
        $this->app->singleton(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\Eloquents\UserRepository'
        );

        $this->app->singleton(
            'App\Repositories\ItemRepositoryInterface',
            'App\Repositories\Eloquents\ItemRepository'
        );

         $this->app->singleton(
            'App\Repositories\RoleRepositoryInterface',
            'App\Repositories\Eloquents\RoleRepository'
        );

        require_once __DIR__ . '/../Helpers/simple_html_dom.php';

    }
}
