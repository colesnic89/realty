<?php

use app\components\Html\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Object\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form white-block">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Main information'),
                'content' => $this->render('_main_form', [
                    'model' => $model,
                    'form' => $form,
                ]),
            ],
            [
                'label' => Yii::t('app', 'Images'),
                'content' => $this->render('_images_form', [
                    'model' => $model,
                    'form' => $form,
                    'initialImagesPreview' => $initialImagePreview,
                    'initialImagesPreviewConfig' => $initialImagesPreviewConfig,
                ]),
            ],
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::saveSubmitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
