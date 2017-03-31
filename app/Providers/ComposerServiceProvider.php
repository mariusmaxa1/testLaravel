<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(Factory $factory)
    {
        $factory->composer('_partials.front.menu', 'App\Http\ViewComposers\MenuComposer');
        $factory->composer('_partials.admin.sort_snippet', 'App\Http\ViewComposers\OrderByComposer');
        $factory->composer('_partials.front.menu', 'App\Http\ViewComposers\RoleComposer'); 
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
