<?php

namespace App\Providers;

use App\Services\Currency\CurrencyConversion;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.layout', 'App\View\Custom\CategoriesComposer');
        View::composer(['layouts.layout'], 'App\View\Custom\CurrenciesComposer');
        View::composer('layouts.layout', 'App\View\Custom\PopularProductsComposer');

        View::composer('*', function($view) {
            $currencySymbol = CurrencyConversion::getCurrencySymbol();

            $view->with('currencySymbol', $currencySymbol);
        });
    }
}
