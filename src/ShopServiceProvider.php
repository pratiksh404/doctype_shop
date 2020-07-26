<?php

namespace doctype_admin\Shop;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class ShopServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\DoctypeAdminShopInstallerCommand::class
        ]);
    }

    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migartions');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'shop');
        $this->registerRoutes();
    }

    protected function registerPublishing()
    {
        /* Config file publish */
        $this->publishes([
            __DIR__ . '/../config/shop.php' => config_path('shop.php')
        ], 'shop-config');
        /* Views File Publish */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/shop'),
        ], 'shop-views');
        /* Migration File Publish */
        $this->publishes([
            __DIR__ . '/../database/migartions' => database_path('migrations')
        ], 'shop-migrations');
        /* Seed File Publish */
        $this->publishes([
            __DIR__ . '/../database/seeds' => database_path('seeds')
        ], 'shop-seeds');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix' => config('shop.prefix', 'admin'),
            'namespace' => 'doctype_admin\shop\Http\Controllers',
            'middleware' => config('shop.middleware', ['web', 'auth', 'activity', 'role:admin'])
        ];
    }
}
