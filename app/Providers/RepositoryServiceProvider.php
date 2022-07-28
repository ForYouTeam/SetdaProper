<?php

namespace App\Providers;

use App\Interfaces\CalendarServiceInterfaces;
use App\Repositories\CalendarServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CalendarServiceInterfaces::class, CalendarServiceRepository::class);
    }

    public function boot()
    {
        //
    }
}
