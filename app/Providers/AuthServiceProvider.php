<?php

namespace FederalSt\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'FederalSt\Model' => 'FederalSt\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Usuário é um adiministrador
        Gate::define('admin', function () {
            $role = Auth::user()->role;
            $rotaAdm = isAdmin();

            if( $rotaAdm == true && $role != 2 )
                abort('403','Página não disponível para seu Usuário');
        });

        Gate::define('isAdmin', function () {
            $role = Auth::user()->role;
            return ($role == 2) ? true : false;
        });

    }
}
