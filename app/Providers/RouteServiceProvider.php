<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

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

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        /*path to route files*/
        $route_files_prefix = "routes/web";//Files Path

        /**
         * Web.php routes
         */
        $this->mapWebRouteWithOutTranslation("{$route_files_prefix}/web.php", 'dashboard/admin');

        /**
         * FrontEnd.php routes
         */
        $this->mapWebRouteWithTranslation("{$route_files_prefix}/FrontEnd.php",
            null, 'FrontEnd', "$this->namespace\FrontEnd");

        /**
         * Admin Dashboard Routes
         * Admin.php
         */
        $this->mapWebRouteWithOutTranslation("{$route_files_prefix}/Admin.php",
            "dashboard/admin", "admin", $this->namespace . "\Dashboard\Admin");
    }

    /**
     * Map multilingual site routes with given values
     * @var string $path route file path
     * @var string|null $prefix url prefix
     * @var string|null $name route name prefix
     * @var string|null $namespace route files namespace
     * @var string $middleware
     */
    private function mapWebRouteWithTranslation($path, $prefix = null, $name = null, $namespace = null)
    {
        Route::middleware(['web','localize'])
            ->namespace($namespace ?? $this->namespace)
            ->prefix($prefix)
            ->name($name ? "{$name}." : "")
            ->group(base_path($path));
    }

    /**
     * Map multilingual site routes with given values
     * @var string $path route file path
     * @var string|null $prefix url prefix
     * @var string|null $name route name prefix
     * @var string|null $namespace route files namespace
     * @var string $middleware
     */
    private function mapWebRouteWithOutTranslation($path, $prefix = null, $name = null, $namespace = null)
    {
        Route::middleware("web")
            ->namespace($namespace ?? $this->namespace)
            ->prefix($prefix)
            ->name($name ? "{$name}." : "")
            ->group(base_path($path));
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
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
