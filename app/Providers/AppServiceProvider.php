<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        Gate::define('admin', function($user){
            return $user->role_id === User::ADMIN_ROLE_ID ? Response::allow() : Response::deny('You must be an admin');
        });
    }
}
