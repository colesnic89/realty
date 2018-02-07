<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
?>

<div class="row">
    <div class="panel panel-default center-block">
        <div class="panel-heading">
            <?= Yii::t('app', 'Login form') ?>
        </div>
        <div class="panel-body">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($loginForm, 'username')->textInput() ?>

            <?= $form->field($loginForm, 'password')->passwordInput() ?>

            <?= $form->field($loginForm, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
