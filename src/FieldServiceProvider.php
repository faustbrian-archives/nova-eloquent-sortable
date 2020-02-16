<?php

namespace KodeKeep\NovaEloquentSortable;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-eloquent-sortable', __DIR__.'/../dist/js/field.js');
        });

        $this->app->booted(function () {
            $this->loadRoutes();
        });
    }

    /**
     * Register the field's routes.
     */
    protected function loadRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', 'api'])
            ->prefix('nova-vendor/kodekeep/nova-eloquent-sortable')
            ->group(__DIR__.'/../routes/api.php');
    }
}
