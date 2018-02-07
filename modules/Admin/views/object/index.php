<?php

use yii\widgets\Pjax;
use app\components\DatePicker\DatePicker;
use app\components\Html\Html;
use app\components\Date\DateHelper;
use app\components\GridView\GridView;
use app\models\Object\ObjectStatusEnum;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Object\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-index">
    
    <p>
        <?= Html::createLink(Yii::t('app', 'Create object'), ['create']) ?>
    </p>

    <?php Pjax::begin(); ?>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'Title',
                [
                    'attribute' => 'Price',
                    'filter' => Html::activeInput('number', $searchModel, 'Price', ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'CreatedAt',
                    'value' => function($model) {
                        return DateHelper::format($model->CreatedAt);
                    },
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'CreatedAt',
                    ]),
                ],
                [
                    'attribute' => 'CreatedBy',
                    'value' => function($model) {
                        return $model->createdBy->username;
                    },
                ],
                [
                    'attribute' => 'Status',
                    'value'     => function($model) {
                        return ObjectStatusEnum::getName($model->Status);
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'Status', ObjectStatusEnum::getList(false, '-'), ['class' => 'form-control']),
                ],
                
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    <?php Pjax::end(); ?>
</div>
