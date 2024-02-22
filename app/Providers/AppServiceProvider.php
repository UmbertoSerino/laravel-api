<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        // importare bootstrap Illuminate\Paginator\Paginator per renderlo visibile, altrimenti usa Tailwind
        Paginator::useBootstrapFive();
    }
}
