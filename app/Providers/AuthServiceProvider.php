<?php

namespace App\Providers;
use App\Chamado;
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
        'App\Chamado' => 'App\Policies\ChamadoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //define a regra de acesso de acl.
        /*Gate::define('ver-chamado',function($user,Chamado $chamado){
         return $user->id == $chamado->user_id ;

        });
        */
    }
}
