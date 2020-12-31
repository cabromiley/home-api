<?php

namespace App\Providers;

use App\Resource\Hue;
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
        $this->app->singleton(Hue::class, fn () => new Hue(config('hue.base_url'), config('hue.user_token')));
    }
}
