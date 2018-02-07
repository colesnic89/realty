<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Object\Object */

$this->title = Yii::t('app', 'Create Object');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
