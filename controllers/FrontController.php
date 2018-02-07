<?php

namespace app\controllers;

use Yii;
use app\controllers\ApplicationController;
use app\views\themes\basic\BasicTheme;

class FrontController extends ApplicationController
{
    
    public function init()
    {
        parent::init();

        Yii::$app->view->theme = new BasicTheme();
        
        $this->module->layoutPath = Yii::$app->view->theme->getThemeLayoutsPath();

        $this->layout = 'frontend';
    }
    
}