<?php

namespace App\Modules\Todo\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('todo', 'Resources/Lang', 'app'), 'todo');
        $this->loadViewsFrom(module_path('todo', 'Resources/Views', 'app'), 'todo');
        $this->loadMigrationsFrom(module_path('todo', 'Database/Migrations', 'app'), 'todo');
        $this->loadConfigsFrom(module_path('todo', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('todo', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
