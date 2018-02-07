<?php

namespace app\components\Date;

use Yii;

class DateHelper
{
    
    public static function format($date, $format = null)
    {
        if (empty($format)) {
            $format = Yii::$app->params['defaultDisplayDateTimeFormat'];
        }
        return date($format, strtotime($date));
    }
    
}