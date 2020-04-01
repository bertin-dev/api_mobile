<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //permet de lister toutes les routes oauth
        Passport::routes();

        //permet de mettre une duree pour les tokens
        Passport::tokensExpireIn(Carbon::now()->addMinute(10));
        Passport::refreshTokensExpireIn(Carbon::now()->addDay(30));

        //
    }
}
