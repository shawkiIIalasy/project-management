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

        Gate::define('isManager', function (User $user) {
            return $user->privilege()->whereNotNull('manage_access_code')
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('isEmployee', function (User $user) {
            return $user->department()->whereNotNull('access_code')
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });
    }
}
