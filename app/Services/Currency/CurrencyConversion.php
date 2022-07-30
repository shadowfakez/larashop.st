<?php

namespace App\Services\Currency;

use App\Models\Currency;

class CurrencyConversion
{
    protected static $container;

    public static function loadContainer()
    {
        if (is_null(self::$container)) {
            $currencies = Currency::all();
            foreach ($currencies as $currency) {
                self::$container[$currency->code] = $currency;
            }
        }

    }

    public static function getCurrencies()
    {
        return self::$container;
    }

    public static function convert($sum, $originCurrencyCode = 'UAH', $targetCurrencyCode = null)
    {
        self::loadContainer();

        $originCurrency = self::$container[$originCurrencyCode];
        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = session('currency', 'UAH');
        }
        $targetCurrency = self::$container[$targetCurrencyCode];

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }

    public static function getCurrencySymbol()
    {
        self::loadContainer();

        $currencyFromSession = session('currency', 'UAH');
        $currency = self::$container[$currencyFromSession];
        return $currency->symbol;
    }

    public static function getCurrencyCode()
    {
        self::loadContainer();

        $currencyFromSession = session('currency', 'UAH');
        $currency = self::$container[$currencyFromSession];
        return $currency->code;
    }
}
