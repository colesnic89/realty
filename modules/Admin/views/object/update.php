<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Object\Object */

$this->title = Yii::t('app', 'Update Object: {nameAttribute}', [
    'nameAttribute' => $model->Title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="object-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
