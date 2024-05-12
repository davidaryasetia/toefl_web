<?php

namespace App\Providers;

use App\Http\Controllers\TestToeflController\PaketController;
use App\Http\Controllers\TestToeflController\TypeController;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        app()->singleton('dataPaket', function() {
            return app()->make(PaketController::class)->index();
        });
        app()->singleton('dataTipe', function() {
            return app()->make(TypeController::class)->index();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
