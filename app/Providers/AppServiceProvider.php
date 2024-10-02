<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\AdminAccessPolicy;
use App\Models\admin\admin;
use Gate;
use Storage;
use Illuminate\Contracts\Foundation\Application;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Illuminate\Filesystem\FilesystemAdapter;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;

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
        Gate::define('manage-everything', function ($user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manage-limited', function ($user) {
            return $user->isAdmin();
        });
    }
}
