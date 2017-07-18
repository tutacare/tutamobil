<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class TutaFormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      Form::component('tutaText', 'components.tutaform.text', ['name', 'value' => null, 'required' => null, 'attributes' => [], 'label_name' => null]);
      Form::component('tutaEmail', 'components.tutaform.email', ['name', 'value' => null, 'required' => null, 'attributes' => [], 'label_name' => null]);
      Form::component('tutaArea', 'components.tutaform.area', ['name', 'value' => null, 'required' => null, 'attributes' => [], 'label_name' => null]);
      Form::component('tutaAddon', 'components.tutaform.addon', ['name', 'value' => null, 'addon' => null, 'last' => null, 'required' => null, 'attributes' => [], 'label_name' => null]);
      Form::component('tutaPass', 'components.tutaform.pass', ['name', 'required' => null, 'attributes' => [], 'label_name' => null, 'description' => null]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
