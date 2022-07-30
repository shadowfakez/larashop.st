<?php

namespace App\Services\Currency;

use Exception;
use GuzzleHttp\Client;

class CurrencyRates
{
    public static function getRates()
    {
        $baseCurrency = CurrencyConversion::getBaseCurrency();

        /*$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/latest?base=" . $baseCurrency->code,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: QBGuzXzxZylBK8W7V49nDJMKytdN9UFK"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;*/

        $url = config('currency_rates.api_url') . '?base=' . $baseCurrency->code;

        $client = new Client();

        $response = $client->request('GET', $url, [
            'headers' => ["apikey" => config('currency_rates.api_key')]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('There is a problem with a currency rate service');
        }
        $rates = json_decode($response->getBody()->getContents(), true)['rates'];

        foreach (CurrencyConversion::getCurrencies() as $currency) {
            if (!$currency->isMain()) {
                if (!isset($rates[$currency->code])) {
                    throw new Exception('There is a problem with a currency ' . $currency->code);
                } else {
                    $currency->update(['rate' => $rates[$currency->code]]);
                    $currency->touch();
                }
            }
        }
    }
}
