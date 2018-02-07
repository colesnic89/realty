<?php

namespace app\modules\Account\controllers;

use Yii;
use app\models\User\UserTypeEnum;
use app\controllers\BackController;
use yii\web\ForbiddenHttpException;
use app\views\themes\account\AccountTheme;

class AccountController extends BackController
{

    public function init()
    {
        parent::init();

        if (Yii::$app->user->identity->Type !== UserTypeEnum::USER) {
            throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));
        }

        Yii::$app->view->theme = new AccountTheme();
        $this->module->layoutPath = Yii::$app->view->theme->getThemeLayoutsPath();
        $this->layout = 'account';
    }

}