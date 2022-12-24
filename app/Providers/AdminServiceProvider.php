<?php

namespace App\Providers;

use App\View\Components\AdminLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('admin-layout', AdminLayout::class);
    }
}
