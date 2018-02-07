<?php

namespace app\models\User;

use Yii;
use app\components\Enum\Enum;

class UserTypeEnum extends Enum
{

    const SUPER_ADMIN = 'SuperAdmin';

    const ADMIN = 'Admin';

    const AGENT = 'Agent';

    const USER = 'User';

    public static function items()
    {
        return [
            self::SUPER_ADMIN => Yii::t('app', 'Super admin'),
            self::ADMIN       => Yii::t('app', 'Admin'),
            self::AGENT       => Yii::t('app', 'Agent'),
            self::USER        => Yii::t('app', 'User'),
        ];
    }

}