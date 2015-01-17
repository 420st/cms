<?php

namespace Fourtwenty\Cms;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\HTML;

class CmsServiceProvider extends ServiceProvider
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
        $this->package('fourtwenty/cms');
        include __DIR__ . '/../../routes.php';
        include __DIR__ . '/../../filters.php';
        include __DIR__ . '/../../start/global.php';

        // create a different db con for the package, merging existing con settings
        $this->app['config']['database.connections.fourtwenty.cms'] = array_merge(
                $this->app['config']['database.connections.mysql'], \Config::get('cms::database.connections.mysql')
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('cms');
    }

}
