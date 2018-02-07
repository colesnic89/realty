<?php

namespace app\models\Object;

use Yii;
use app\components\Enum\Enum;

class ObjectStatusEnum extends Enum
{

    const NOT_CONFIRMED = 'NotConfirmed';

    const ACTIVE = 'Active';

    const DISABLED = 'Disabled';

    const DELETED = 'Deleted';

    public static function items()
    {
        return [
            self::NOT_CONFIRMED => Yii::t('app', 'Not confirmed'),
            self::ACTIVE        => Yii::t('app', 'Active'),
            self::DISABLED      => Yii::t('app', 'Disabled'),
            self::DELETED       => Yii::t('app', 'Deleted'),
        ];
    }

}