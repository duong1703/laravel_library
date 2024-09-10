<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\AdminAccessPolicy;
use App\Models\admin\admin;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(admin::class,AdminAccessPolicy::class );

        Gate::define('manage-everything', function ($user) {
            return $user->isSuperAdmin(); 
        });

        Gate::define('manage-limited', function ($user) {
            return $user->isAdmin(); 
        });
    
    }
}
