<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Hashing\Hasher;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Factory $factory
     * @param Hasher $hasher
     */
    public function boot(Factory $factory, Hasher $hasher)
    {
        $factory->extend('old_password', function ($attribute, $value, $parameters) use ($hasher) {
            return $hasher->check($value, $parameters[0]);
        });
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
