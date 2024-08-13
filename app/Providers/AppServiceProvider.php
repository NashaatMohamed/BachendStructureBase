<?php

namespace App\Providers;

use App\Auth\CleanArchitecture\Interfaces\PasswordHasher;
use App\Auth\CleanArchitecture\Interfaces\PasswordHasherInterface;
use App\Auth\CleanArchitecture\Interfaces\UserRepository;
use App\Auth\CleanArchitecture\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PasswordHasherInterface::class, PasswordHasher::class);
    }
}
