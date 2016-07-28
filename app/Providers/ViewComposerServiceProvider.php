<?php

namespace App\Providers;

use App\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view)
        {
            if(Auth::guest())
            {
                $community = Community::whereId(1)->first();
            }
            if(Auth::user())
            {
                $community = Auth::user()->community;
            }
            $view->with(['community' => $community]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
