<?php

namespace app\components\Enum;

use yii\base\InvalidParamException;

abstract class Enum
{

    final static function getList($withoutLabels = false, $addFirstEmpty = false)
    {
        $default = !$withoutLabels && $addFirstEmpty !== false ? ['' => $addFirstEmpty] : [];
        $items = $withoutLabels ? array_keys(static::items()) : static::items();
        return $default + $items;
    }

    final static function getName($key)
    {
        $items = static::items();
        if (!isset($items[$key])) {
            throw new InvalidParamException("Key `{$key}` not found in items list");
        }
        return $items[$key];
    }

    public abstract static function items();
    
}