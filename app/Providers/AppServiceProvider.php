<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Listeners\EmailUsersAboutSeriesCreated;
use App\Events\SeriesCreated;


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
        Event::listen(
            SeriesCreated::class,
            EmailUsersAboutSeriesCreated::class,
        );
    }
}
