<?php namespace Parsidev\Jalali;

use Illuminate\Support\ServiceProvider;

class JalaliServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['jalali'] = $this->app->singleton(jDate::class, function ($app) {
            return new jDate;
        });

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('jDate', 'Parsidev\Jalali\jDate');
        });

        $this->app['jDateTime'] = $this->app->singleton(jDateTime::class, function ($app) {
            return new jDateTime;
        });
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('jDateTime', 'Parsidev\Jalali\jDateTime');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('jalali', 'jDateTime');
    }
}
