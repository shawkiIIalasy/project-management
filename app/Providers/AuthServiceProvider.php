<?php

namespace App\Providers;

use App\Models\Privilege;
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
            return $user->privilege && !empty($user->privilege->manage_access_code)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('store', function (User $user) {
            return $user->privilege && !empty($user->privilege->manage_access_code)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('update', function (User $user) {
            return $user->privilege && !empty($user->privilege->manage_access_code)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });

        Gate::define('show', function (User $user) {
            return $user->department || $user->privilege && !empty($user->privilege->manage_access_code)
                ? Response::allow()
                : Response::deny('You don\'t have access to this location.');
        });
    }
}
