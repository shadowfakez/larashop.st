<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
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
            return "<?php echo Route::currentRouteNamed($route) ? 'bg-indigo-100' : '' ?>";
        });

        Blade::directive('adminLayoutActiveRoute', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'text-md text-gray-100' : 'text-gray-400 text-sm' ?>";
        });

        Product::observe(ProductObserver::class);
    }
}
