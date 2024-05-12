<?php

namespace JourneyCX\AuthUser;

/*
 * Service Provider for AuthUser
 *-------------------------------------------------------- */

use Illuminate\Support\ServiceProvider;
use Blade;

class AuthUserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/yes-authority.php' => config_path('yes-authority.php'),
            __DIR__.'/AuthUserCheckpostMiddleware.php' => app_path('Http/Middleware/AuthUserCheckpostMiddleware.php'),
            __DIR__.'/AuthUserPreCheckpostMiddleware.php' => app_path('Http/Middleware/AuthUserPreCheckpostMiddleware.php'),
        ], 'authuser');

        // required AuthUser helpers & directives
        require __DIR__.'/support/helpers.php';
        require __DIR__.'/support/directives.php';
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Register 'authuser' instance container to our AuthUser object
        $this->app->singleton('authuser', function ($app) {
               return new \JourneyCX\AuthUser\AuthUser();
        });

        // Register Alias
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('AuthUser',
                \JourneyCX\AuthUser\AuthUserFacade::class);
        });
    }
}
