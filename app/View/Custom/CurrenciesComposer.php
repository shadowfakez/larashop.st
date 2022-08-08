<?php

namespace App\View\Custom;

use App\Services\Currency\CurrencyConversion;
use Illuminate\View\View;

class CurrenciesComposer
{
    public function compose(View $view) {
        $currencyCode = CurrencyConversion::getCurrencyCode();
        $currencies = CurrencyConversion::getCurrencies();

        $view->with('currencyCode', $currencyCode);
        $view->with('currencies', $currencies);
    }
}
