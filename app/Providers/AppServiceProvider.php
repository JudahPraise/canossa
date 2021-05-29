<?php

namespace App\Providers;

use App\User;
use App\Announcement;
use Illuminate\Support\Facades\Auth;
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
            
            $view->with('users', User::all());

        });

        view()->composer('admin.messages.index', function($view){
            //
        });

        // view()->composer('partials.employee.top-bar', function ($view) {
            
        //     dd(auth()->user()->education->grad->first());

        // });

    }
}
