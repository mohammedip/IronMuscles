<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Machine;
use App\Models\Abonnement;
use App\Models\Speciality;
use App\Models\Entrainement;
use App\Policies\MemberPolicy;
use App\Policies\MachinePolicy;
use App\Policies\TrainingPolicy;
use App\Policies\AbonnementPolicy;
use App\Policies\SpecialitePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; 


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies =[
        User::class => MemberPolicy::class,
        Abonnement::class => AbonnementPolicy::class,
        Speciality::class => SpecialitePolicy::class,
        Machine::class => MachinePolicy::class,
        Entrainement::class => TrainingPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
    }
}
