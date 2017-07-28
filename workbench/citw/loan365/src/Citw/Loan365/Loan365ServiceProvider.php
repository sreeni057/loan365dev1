<?php namespace Citw\Loan365;

use Illuminate\Support\ServiceProvider;

/**
 * The Loan365ServiceProvider class
 *
 * @package Citw\Loan365
 * @author  Manikandan R <mani@dexeldesigns.com>
 */
class Loan365ServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $packageRoutesPath       = __DIR__ . '/../../routes/web.php';
        $packageConfigPath       = __DIR__ . '/../../config/config.php';
        $packageMigrationsPath   = __DIR__ . '/../../migrations';
        $packageAssetsPath       = __DIR__ . '/../../resources/assets';
        $packageTranslationsPath = __DIR__ . '/../../resources/lang';
        $packageViewsPath        = __DIR__ . '/../../resources/views';

        include $packageRoutesPath;

        $appConfigPath = config_path('Loan365.php');

        $this->mergeConfigFrom($packageConfigPath, 'loan365');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');

        /**
         * Loading and publishing package's translations
         */
        $this->loadTranslationsFrom($packageTranslationsPath, 'loan365');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/loan365'),
        ], 'lang');

        /**
         * Loading and publishing package's views
         */
        $this->loadViewsFrom($packageViewsPath, 'loan365');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/loan365'),
        ], 'views');

        /**
         * Publishing package's assets (JavaScript, CSS, images...)
         */
        $this->publishes([
            $packageAssetsPath => public_path('vendor/loan365'),
        ], 'public');

        /**
         * Loading and publishing package's migrations
         */
        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('/migrations')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('loan365', function ($app) {
            return new Loan365;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'loan365',
        ];
    }
}
