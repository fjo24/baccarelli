<?php

namespace App\Providers;
use App\Dato;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        $telefono   = Dato::where('tipo', 'telefono')->first();
        $telefono2  = Dato::where('tipo', 'telefono2')->first();
        $telefono3  = Dato::where('tipo', 'telefono3')->first();
        $direccion  = Dato::where('tipo', 'direccion')->first();
        $email      = Dato::where('tipo', 'email')->first();
        $email2      = Dato::where('tipo', 'email2')->first();
        view()->share([
            'telefono'   => $telefono,
            'telefono2'  => $telefono2,
            'telefono3'  => $telefono3,
            'direccion'  => $direccion,
            'email'      => $email,
            'email2'      => $email2,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
