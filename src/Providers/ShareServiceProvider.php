<?php

namespace CristianAraujo\Share\Providers;

use Illuminate\Support\ServiceProvider;
use CristianAraujo\Share\Share;

class ShareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->singleton('share', function ($app) {
            return new Share();
        });

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang/', 'laravel-share');

        $this->publishes([
            __DIR__ . '/../../config/laravel-share.php' => config_path('laravel-share.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../resources/scss/share.scss' => resource_path('scss/share.scss'),
        ], 'assets');


        $this->publishes([
            __DIR__ . '/../../resources/lang/' => resource_path('lang/vendor/laravel-share'),
        ], 'translations');

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(Share::class, function () {
            return new Share();
        });

        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-share.php', 'laravel-share');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-share');
    }
}
