<?php
namespace Particker\LaravelGettext;

use Illuminate\Support\ServiceProvider;

class GettextServiceProvider extends ServiceProvider
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
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('gettext.php')
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $dir = config('gettext.directories');
        $domain = config('gettext.domain');
        $lang = config('gettext.locales');
        $charset = config('gettext.charset');
        $gettext =  new Gettext($dir, $domain,$lang,$charset);
        
        $this->app->singleton('gettext', function($app) use ($gettext) {
            return $gettext;
        });
    }
}