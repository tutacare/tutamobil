<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Components\TutaComp;
use Carbon;

class TutaCompServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('id');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('tutacomp', function($app) {
          return new TutaComp($app);
      });
    }
}
