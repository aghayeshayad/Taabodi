<?php

namespace Modules\Rule\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Rule\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        /**
         * Web.php routes
         */
        $this->mapWebRoute("Routes/web.php", "dashboard/admin", "admin", $this->moduleNamespace);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param $path
     * @param null $prefix
     * @param null $name
     * @param null $namespace
     * @return void
     */
    protected function mapWebRoute($path, $prefix = null, $name = null, $namespace = null)
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->prefix($prefix)
            ->name($name ? "{$name}." : "")
            ->group(module_path('Rule', '/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Rule', '/Routes/api.php'));
    }
}
