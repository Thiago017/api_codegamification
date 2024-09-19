<?php

namespace App\Providers;

use App\Repositories\InstitutionRepository;
use App\Repositories\interfaces\InstitutionRepositoryInterface;
use App\Repositories\interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\InstitutionService;
use App\Services\Interfaces\InstitutionServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
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

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
