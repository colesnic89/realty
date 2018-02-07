<?php

namespace app\modules\User\urls;

use Yii;
use yii\helpers\Url;
use app\models\User\UserTypeEnum;
use yii\base\InvalidParamException;

class UserUrl extends Url
{
    
    public static function getLoginUrl()
    {
        return self::toRoute(['/user/login']);
    }

    public static function getLoggedUserAccountUrl()
    {
        switch (Yii::$app->user->identity->Type) {
            case UserTypeEnum::SUPER_ADMIN:
            case UserTypeEnum::ADMIN:
                return self::toRoute(['/admin']);
            case UserTypeEnum::AGENT:
                return self::toRoute(['/agent']);
            case UserTypeEnum::USER:
                return self::toRoute(['/account']);
            default:
                throw new InvalidParamException('Unknown user type');
        }
    }
    
    public static function getLogoutUrl()
    {
        return self::toRoute(['/user/logout']);
    }

}