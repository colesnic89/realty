<?php

namespace app\models\User;

use Yii;
use app\components\Enum\Enum;

class UserStatusEnum extends Enum
{

    const NOT_CONFIRMED = 'NotConfirmed';

    const ACTIVE = 'Active';

    const DISABLED = 'Disabled';

    const BANNED = 'Banned';

    public static function items()
    {
        return [
            self::NOT_CONFIRMED => Yii::t('app', 'Not confirmed'),
            self::ACTIVE        => Yii::t('app', 'Active'),
            self::DISABLED      => Yii::t('app', 'Disabled'),
            self::BANNED        => Yii::t('app', 'Banned'),
        ];
    }

}