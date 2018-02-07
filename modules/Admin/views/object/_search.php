<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Object\ObjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Price') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'IsMortgage') ?>

    <?php // echo $form->field($model, 'CreatedAt') ?>

    <?php // echo $form->field($model, 'CreatedBy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
