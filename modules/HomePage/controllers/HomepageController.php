<?php

namespace app\modules\HomePage\controllers;

use app\controllers\FrontController;

class HomepageController extends FrontController
{
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
}