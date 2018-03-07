<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
        //Route User
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_user.php'));
        //Route Lead
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_lead.php'));
        //Route Gift
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_gift.php'));
        //Route Gift Category
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_giftcategory.php'));
        //Route Product Category
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_productcategory.php'));
        //Route Product
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_product.php'));
        //Route Assignment
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_assignment.php'));
        //Route Message
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_message.php'));
        //Route Tipster
        Route::middleware('web','checkRole','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_tipster.php'));
        //Route Activity
        Route::middleware('web','saveHistoryUser')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_logactivity.php'));
        //Route Activity
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/breadcrumbs.php'));
        //Route UI Tipster
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_ui_tipster.php'));
        //Route UI Tipster
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_messagetemplates.php'));

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
