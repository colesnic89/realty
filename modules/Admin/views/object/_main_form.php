<?php

use dlds\summernote\SummernoteWidget;
use app\components\Money\CurrencyEnum;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Object\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'Description')->widget(SummernoteWidget::class) ?>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-9">
                <?= $form->field($model, 'Price')->input('number', ['step' => 0.01]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'Currency')->dropDownList(CurrencyEnum::getList()) ?>
            </div>
        </div>
    </div>
</div>

<?= $form->field($model, 'IsMortgage')->widget(CheckboxX::className(), [
    'pluginOptions' => [
        'threeState' => false,
    ],
]) ?>