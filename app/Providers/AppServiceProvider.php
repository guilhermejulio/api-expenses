<?php

namespace App\Providers;

use App\Repositories\Contracts\Financial\DeleteExpenseInterface;
use App\Repositories\Contracts\Financial\EditExpenseInterface;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;
use App\Repositories\Financial\DeleteExpenseRepository;
use App\Repositories\Financial\EditExpenseRepository;
use App\Repositories\Financial\PersistExpenseRepository;
use App\Repositories\Financial\RetrieveExpenseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersistExpenseInterface::class, PersistExpenseRepository::class);
        $this->app->bind(EditExpenseInterface::class, EditExpenseRepository::class);
        $this->app->bind(RetrieveExpenseInterface::class, RetrieveExpenseRepository::class);
        $this->app->bind(DeleteExpenseInterface::class, DeleteExpenseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
