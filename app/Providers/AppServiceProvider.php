<?php

namespace App\Providers;

use App\Repositories\InstitutionRepository;
use App\Repositories\interfaces\InstitutionRepositoryInterface;
use App\Services\InstitutionService;
use App\Services\Interfaces\InstitutionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InstitutionRepositoryInterface::class, InstitutionRepository::class);
        $this->app->bind(InstitutionServiceInterface::class, InstitutionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
