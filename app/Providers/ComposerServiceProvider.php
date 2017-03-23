<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(Factory $factory)
    {
        $factory->composer('_partials.front.menu', 'App\Http\ViewComposers\MenuComposer');  
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
