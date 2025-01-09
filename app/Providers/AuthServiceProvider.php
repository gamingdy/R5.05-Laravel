<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider{
    public function boot (): void {
        

        Gate::define('manage-modules', function ($user) {

            return $user->role == 'prof';
        });

        Gate::define('manage-evaluations', function (User $user) {
            return $user->role == 'prof' ? Response::allow()
                : Response::deny('You must be an administrator.');
        });
    }
}


