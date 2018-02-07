<?php

namespace app\components\NotificationHelper;

use Yii;
use kartik\growl\Growl;

class NotificationHelper
{
    
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'warning';
    const TYPE_INFO = 'info';
    
    public static function setNotification($message, $title, $type)
    {
        Yii::$app->session->addFlash('_notifications_', [
            'title' => $title,
            'message' => $message,
        ]);
    }
    
    public static function setSuccess($message)
    {
        self::setNotification($message, Yii::t('app', 'Success'), self::TYPE_SUCCESS);
    }
    
    public static function setError($message)
    {
        self::setNotification($message, Yii::t('app', 'Error'), self::TYPE_ERROR);
    }
    
    public static function setInfo($message)
    {
        self::setNotification($message, Yii::t('app', 'Info'), self::TYPE_INFO);
    }

    public static function displayNotifications()
    {
        $notifications = Yii::$app->session->getFlash('_notifications_', []);
        
        $html = '';
        foreach ($notifications as $notification)
        {
            $html .= Growl::widget([
                'type' => Growl::TYPE_SUCCESS,
                'title' => $notification['title'],
                //'icon' => 'glyphicon glyphicon-ok-sign',
                'body' => $notification['message'],
                'showSeparator' => true,
                'delay' => 0,
                'pluginOptions' => [
                    'showProgressbar' => false,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
        }
        
        return $html;
    }
    
}