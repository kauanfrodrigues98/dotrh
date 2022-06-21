<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Verifica se o nivel de acesso é Administrador
        Gate::define('is_admin', function(User $user) {
            return $user->nivel_acesso == 1;
        });

        // Verifica se o nivel de acesso é Lider
        Gate::define('is_lider', function(User $user) {
            return $user->nivel_acesso == 2;
        });

        // Verifica se o nivel de acesso é Funcionário
        Gate::define('is_funcionario', function(User $user) {
            return $user->nivel_acesso == 3;
        });
    }
}
