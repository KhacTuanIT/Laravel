<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Spa\Slider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('spa.footer',function($view) {
            $sliders = Slider::take(6)->get();
            $view->with('sliders', $sliders);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
