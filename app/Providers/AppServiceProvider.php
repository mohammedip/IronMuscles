<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AuthRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('role', function ($roles) {
            return "<?php if(auth()->check() && auth()->user()->hasAnyRole($roles)): ?>";
        });
    
        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });
    }
}
