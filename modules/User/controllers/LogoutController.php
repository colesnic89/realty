<?php

namespace app\modules\User\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use app\controllers\BackController;

class LogoutController extends BackController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->logout()) {
            return $this->redirect(Url::toRoute(['/']));
        }
    }

}