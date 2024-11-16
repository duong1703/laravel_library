<?php

namespace App\Providers;

use App\Models\admin\admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Gate;
use DB;
use RateLimiter;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

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

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });

        ResetPassword::createUrlUsing(function (admin $admin, string $token) {
            return route('password.reset', ['token' => $token]);
        });

         // Đếm số lượng tin nhắn chưa trả lời
        $unansweredCount = DB::table('message')->where('status', 'chưa trả lời')->count();
    
         // Chia sẻ biến toàn cục cho tất cả các view
        View::share('unansweredCount', $unansweredCount);
    }
}
