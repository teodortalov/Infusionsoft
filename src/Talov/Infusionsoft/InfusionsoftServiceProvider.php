<?php namespace Talov\Infusionsoft;

use Illuminate\Support\ServiceProvider;

class InfusionsoftServiceProvider extends ServiceProvider {

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
		$this->package('talov/infusionsoft');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
    $this->app['config']->package('talov/infusionsoft', 'talov/infusionsoft', 'talov/infusionsoft');

    $this->app['infusionsoft'] = $this->app->share(function($app)
    {
        return new Infusionsoft;
    });
  }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('infusionsoft');
	}

}