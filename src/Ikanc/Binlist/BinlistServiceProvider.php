<?php namespace Ikanc\Binlist;

use Illuminate\Support\ServiceProvider;

class BinlistServiceProvider extends ServiceProvider {

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
        $this->package('ikanc/binlist', null, __DIR__);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app['binlist'] = $this->app->share(function($app)
        {
            return new Binlist;
        });

//        $this->app->booting(function()
//        {
//            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
//            $loader->alias('Binlist', 'Ikanc\Binlist\Facades\Binlist');
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
