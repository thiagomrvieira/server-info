<?php

namespace App\Providers;

use App\Repositories\Interfaces\ServerRepositoryInterface;
use App\Repositories\ServerEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServerRepositoryInterface::class, ServerEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
