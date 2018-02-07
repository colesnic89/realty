<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User\User */

$this->title = Yii::t('app', 'Update User: {nameAttribute}', [
    'nameAttribute' => $model->username,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
