<?php

namespace EPink\Contact;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Laravel\Passport\Passport;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
      $this->loadRoutesFrom(__DIR__ . '/routes.php');
      // $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
      // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact');

      $this->publishes([
          __DIR__.'/../database/migrations' => database_path('migrations'),
          __DIR__.'/../database/seeds' => database_path('seeds')
      ], 'epink-contact-migrations');

      $this->publishes([
        __DIR__.'/../resources/js' => base_path('resources/js/contact'),
        __DIR__.'/../resources/sass' => base_path('resources/sass/contact')
      ], 'epink-contact-assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      
    }

    /**
     * Register the package factories
     */
    protected function loadFactoriesFrom($path)
    {
      $this->app->make(Factory::class)->load($path);
    }
}