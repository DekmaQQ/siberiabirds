<?php

namespace App\Providers;

use App\Models\BirdFamily;
use App\Models\BirdGenus;
use App\Models\BirdOrder;
use App\Models\BirdSpecies;
use App\Models\SpeciesPopulationStatus;
use App\Models\SpeciesStatus;
use App\Models\UserRole;
use App\Policies\MainPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(BirdOrder::class, MainPolicy::class);
        Gate::policy(BirdFamily::class, MainPolicy::class);
        Gate::policy(BirdGenus::class, MainPolicy::class);
        Gate::policy(BirdSpecies::class, MainPolicy::class);
        Gate::policy(SpeciesPopulationStatus::class, MainPolicy::class);
        Gate::policy(SpeciesStatus::class, MainPolicy::class);
        Gate::policy(UserRole::class, MainPolicy::class);
    }
}
