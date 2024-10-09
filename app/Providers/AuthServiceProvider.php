<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('categoryCanView', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('userCanView', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('productCanView', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('tableCanView', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('bookingCanView', function($user) {
            return $user->role == 'admin';
        });
    }
}
