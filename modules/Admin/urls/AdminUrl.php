<?php

namespace app\modules\Admin\urls;

use yii\helpers\Url;

class AdminUrl extends Url
{

    // dashboard
    public static function getDashboardUrl()
    {
        return self::toRoute(['/admin']);
    }
    
    // user managment
    public static function getUsersManagmentUrl()
    {
        return self::toRoute(['/admin/user']);
    }
    
    public static function getUserDeleteUrl($userID)
    {
        return self::toRoute(['/admin/user/delete', 'id' => $userID]);
    }
    
    
    public static function getObjectsManagmentUrl()
    {
        return self::toRoute(['/admin/object']);
    }
    
    public static function getUserSearchUrl()
    {
        return self::toRoute(['/user/user-search/admin-search']);
    }

}