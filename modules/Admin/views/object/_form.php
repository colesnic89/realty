<?php

use app\components\Html\Html;
use yii\widgets\ActiveForm;
use app\components\Html\MaskMoney;
use dlds\summernote\SummernoteWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Object\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form white-block">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->widget(SummernoteWidget::class) ?>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Price')->widget(MaskMoney::class) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'IsMortgage')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::saveSubmitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
