<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('layoutActiveRoute', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'bg-gray-200' : '' ?>";
        });

        Blade::directive('adminLayoutActiveRoute', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'text-md text-gray-100' : 'text-gray-400 text-sm' ?>";
        });
    }
}
