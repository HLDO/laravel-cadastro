<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cadastro;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Cadastro::observe(CadastroObserver::class);
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
