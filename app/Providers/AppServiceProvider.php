<?php

namespace App\Providers;

use App\Announcement;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials.employee.top-bar', function ($view) {
        
            $view->with('notifications', auth()->user()->notifications);
    
        });
    }
}
