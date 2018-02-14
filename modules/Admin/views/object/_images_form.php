<?php

use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $model app\models\Object\Object */
?>

<?php if ($model->isNewRecord) { ?>
<div class="alert alert-info">
    <?= Yii::t('app', 'Please save object before') ?>
</div>
<?php } else { ?>
<?= FileInput::widget([
    'name' => 'images[]',
    'options' => ['multiple' => true, 'accept' => '.png,.jpg,.jpeg'],
    'pluginOptions' => [
        'initialPreview' => $initialImagesPreview,
        'showCaption' => false,
        'browseClass' => 'btn btn-info btn-block',
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'overwriteInitial' => false,
        'minFileCount' => 1,
        'maxFileCount' => 10,
        'initialPreviewAsData' => true,
        'showRemove' => false,
        'showUpload' => false,
        'uploadAsync' => false,
        'uploadUrl' => Url::toRoute(['/admin/object/upload-images', 'objectID' => $model->ID]),
    ],
    'pluginEvents' => [
        'filebatchselected' => new yii\web\JsExpression("
            function(event, files) {
                $(event.target).fileinput('upload');
            }
        "),
    ],
]); ?>
<?php } ?>

