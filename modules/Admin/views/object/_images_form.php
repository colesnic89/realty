<?php

use kartik\file\FileInput;
use yii\helpers\Url;

?>

<?= FileInput::widget([
    'name' => 'images[]',
    'options' => ['multiple' => true, 'accept' => '.png,.jpg,.jpeg'],
    'pluginOptions' => [
        'showCaption' => false,
        'browseClass' => 'btn btn-info btn-block',
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'overwriteInitial' => false,
        'minFileCount' => 1,
        'maxFileCount' => 10,
        'initialPreviewAsData' => true,
        'showRemove' => true,
        'showUpload' => true,
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