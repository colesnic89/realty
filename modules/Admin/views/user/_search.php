<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'NickName') ?>

    <?= $form->field($model, 'FirstName') ?>

    <?php // echo $form->field($model, 'LastName') ?>

    <?php // echo $form->field($model, 'RegistrationDate') ?>

    <?php // echo $form->field($model, 'AuthKey') ?>

    <?php // echo $form->field($model, 'Type') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
