<?php

namespace app\components\Money;

use app\components\Money\CurrencyEnum;

class PriceConverter
{

    public static function convert($price, $fromCurrency, $toCurrency, $precission = 2)
    {
        $rate = self::getRate($fromCurrency, $toCurrency);
        return round($price * $rate, $precission);
    }
    
    public static function getRate($fromCurrency, $toCurrency)
    {
        if ($fromCurrency == CurrencyEnum::EUR && $toCurrency == CurrencyEnum::MDL) {
            return 20.6;
        } elseif ($fromCurrency == CurrencyEnum::USD && $toCurrency == CurrencyEnum::MDL) {
            return 16.65;
        }
        return 1;
    }
    
    public static function format($price)
    {
        return floatval($price);
    }
    
}