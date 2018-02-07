<?php

namespace app\controllers;

use app\controllers\FrontController;

class ErrorController extends FrontController
{

    public function actions()
    {
        return [
            'error' => ['class' => 'yii\web\ErrorAction'],
        ];
    }

}