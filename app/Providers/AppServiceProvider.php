<?php
/*
========================================
File: AppServiceProvider.php

Description:
Main Laravel service provider used to
bootstrap application services and share
global data with views.

Functionality:
- Shares all diplomas data with the sidebar view
- Uses View Composer to inject data into:
  'layout.sidebar'

Shared Data:
- sidebar_diplomas:
  A collection of all diplomas from the database

Author:
Nada Khaled

Notes:
- Runs automatically on application boot
- Helps avoid repeating database queries in views
- Keeps sidebar data dynamic and centralized
========================================
*/
namespace App\Providers;
use App\Models\Diploma;
use Illuminate\Support\Facades\View;
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
        View::composer('layout.sidebar' , function ($view) {
        $view->with('sidebar_diplomas', Diploma::all());
    });
    }
}
