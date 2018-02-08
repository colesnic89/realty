<?php

namespace app\modules\User\controllers;

use Yii;
use app\controllers\FrontController;
use app\modules\User\urls\UserUrl;
use app\modules\User\forms\LoginForm;

class LoginController extends FrontController
{

    public function actionIndex()
    {
        $loginForm = new LoginForm();

        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            return $this->redirect(UserUrl::getLoggedUserAccountUrl());
        }

        return $this->render('index', [
                    'loginForm' => $loginForm,
        ]);
    }

}