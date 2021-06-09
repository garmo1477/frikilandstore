<?php

namespace App\Providers;

use App\Product;
use App\User;
use Hashids\Hashids;
use Hashids\HashidsException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Vinkla\Hashids\Facades\Hashids as FacadesHashids;

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

        Route::bind('user', function($value, $route){
            return $this->getModel(User::class, $value);
        });
        Route::bind('product', function($value, $route){
            return $this->getModel(Product::class, $value);
        });
    }

    protected function getModel($model, $routeKey){
        //recuperamos el id de hash de la url, creamos una instancia del modelo y retornamos la instancia del modelo
        $id = FacadesHashids::connection($model)->decode($routeKey)[0] ?? null;
        $modelInstance = resolve($model);
        return $modelInstance->findOrFail($id);
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
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
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
