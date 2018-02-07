<?php

use app\components\Html\Html;
use yii\widgets\ActiveForm;
use app\models\User\UserTypeEnum;
use app\models\User\UserStatusEnum;
use app\modules\Admin\urls\AdminUrl;

/* @var $this yii\web\View */
/* @var $model app\models\User\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="white-block">
    <?= Html::goBackLink(Yii::t('app', 'Back to list'), AdminUrl::getUsersManagmentUrl()) ?>
    <?php if (!$model->isNewRecord) { ?>
    <?= Html::removeLink(Yii::t('app', 'Remove this user'), AdminUrl::getUserDeleteUrl($model->ID)) ?>
    <?php } ?>
</div>

<div class="user-form white-block">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'NickName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Type')->dropDownList(UserTypeEnum::getList(false, Yii::t('app', '-'))) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Status')->dropDownList(UserStatusEnum::getList(false, Yii::t('app', '-'))) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::saveSubmitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
