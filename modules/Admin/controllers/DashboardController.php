<?php

namespace app\modules\Admin\controllers;

use Yii;
use app\modules\Admin\controllers\AdminController;

class DashboardController extends AdminController
{
    
    public function init()
    {
        parent::init();
        
        $this->view->title = Yii::t('app', 'Dashboard');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}