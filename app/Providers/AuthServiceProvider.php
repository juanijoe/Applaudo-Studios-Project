<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Candidate' => 'App\Policies\CandidatePolicy',
        'App\Models\Company' => 'App\Policies\CompanyPolicy',
        'App\Models\Recruiter' => 'App\Policies\CompanyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::personalAccessTokensExpireIn(now()->addMinutes(10));

        //Passport::personalAccessClientId('client-id');
    }
}
