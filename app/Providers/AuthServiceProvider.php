<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Item;
use App\Policies\ItemPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Item::class => ItemPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-item', function ($user) {
            return $user->hasPermissionOfUser('edit-item');
        });

        Gate::define('create-item', function ($user) {
            return $user->hasPermissionOfUser('create-item');
        });

        Gate::define('delete-item', function ($user) {
            return $user->hasPermissionOfUser('delete-item');
        });
    }
}
