<?php

namespace app\modules\Account\controllers;

use app\modules\Account\controllers\AccountController;

class DashboardController extends AccountController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}