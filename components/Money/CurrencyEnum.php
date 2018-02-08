<?php

namespace app\components\Money;

use Yii;
use app\components\Enum\Enum;

class CurrencyEnum extends Enum
{
    
    const EUR = 'EUR';
    
    const USD = 'USD';
    
    const MDL = 'MDL';
    
    public static function items()
    {
        return [
            self::EUR => Yii::t('app', 'EUR'),
            self::USD => Yii::t('app', 'USD'),
            self::MDL => Yii::t('app', 'MDL'),
        ];
    }
    
}