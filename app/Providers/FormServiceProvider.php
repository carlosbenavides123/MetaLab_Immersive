<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText','components.form.text',['name','value'=>null,'attributes'=>[]]);
        Form::component('bsTextarea','components.form.textarea',['name','value'=>null,'attributes'=>[]]);
        Form::component('submit','components.form.text',['value'=>'Submit','attributes'=>[]]);
        Form::component('hidden','component.form.hidden',['name','value'=>null,'attributes'=>[]]);
        Form::component('file','component.form.file',['name','attribute'=>[]]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
