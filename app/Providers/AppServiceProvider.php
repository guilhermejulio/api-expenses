<?php

namespace App\Providers;

use App\Repositories\Contracts\Financial\PersistExpenseInterface;
use App\Repositories\Financial\PersistExpenseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersistExpenseInterface::class, PersistExpenseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
