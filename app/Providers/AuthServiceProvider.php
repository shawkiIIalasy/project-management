<?php

namespace App\Providers;

use App\Models\Manage;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('index', function (User $user) {
            return !empty(!empty($user->manage_id))
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('store', function (User $user) {
            return !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('update', function (User $user) {
            return !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('list', function (User $user) {
            return !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('delete', function (User $user) {
            return !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('show', function (User $user) {
            return empty($user->manage_id) || !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('employee', function (User $user) {
            return empty($user->manage_id) || !empty($user->manage_id)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });
    }
}
