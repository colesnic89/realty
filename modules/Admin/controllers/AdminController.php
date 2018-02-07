<?php

namespace app\modules\Admin\controllers;

use Yii;
use app\models\User\UserTypeEnum;
use app\controllers\BackController;
use yii\web\ForbiddenHttpException;
use app\views\themes\admin\AdminTheme;

class AdminController extends BackController
{

    public function init()
    {
        parent::init();

        if (!in_array(Yii::$app->user->identity->Type, [UserTypeEnum::SUPER_ADMIN, UserTypeEnum::ADMIN])) {
            throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));
        }

        Yii::$app->view->theme = new AdminTheme();
        
        $this->module->layoutPath = Yii::$app->view->theme->getThemeLayoutsPath();

        $this->layout = 'admin';
    }

}