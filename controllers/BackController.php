<?php

namespace app\controllers;

use Yii;
use app\modules\User\urls\UserUrl;
use app\controllers\ApplicationController;

class BackController extends ApplicationController
{

    public function init()
    {
        parent::init();

        if (Yii::$app->user->isGuest) {
            return $this->redirect(UserUrl::getLoginUrl());
        }
    }

}