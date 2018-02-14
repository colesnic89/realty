<?php

use yii\widgets\Pjax;
use app\components\DatePicker\DatePicker;
use app\components\Html\Html;
use app\components\Date\DateHelper;
use app\components\GridView\GridView;
use app\models\Object\ObjectStatusEnum;
use app\components\Money\CurrencyEnum;
use app\components\Money\PriceConverter;
use app\modules\User\widgets\UserDropdownWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Object\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objects');
$this->params['breadcrumbs'][] = $this->title;
?>

<p class="white-block">
    <?= Html::createLink(Yii::t('app', 'Create object'), ['create']) ?>
</p>

<div class="object-index white-block">

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
                    'value' => function($model) {
                        /* @var $model \app\models\Object\Object */
                        return PriceConverter::format($model->Price) . ' ' . CurrencyEnum::getName($model->Currency);
                    },
                    'filter' => '',
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
                    'filter' => UserDropdownWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'CreatedBy',
                        'data' => [$searchModel->CreatedBy => $searchModel->selectedNicknameWithName],
                    ]),
                ],
                [
                    'attribute' => 'Status',
                    'value'     => function($model) {
                        return ObjectStatusEnum::getName($model->Status);
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'Status', ObjectStatusEnum::getList(false, '-'), ['class' => 'form-control']),
                ],
                
                ['class' => 'app\components\GridView\ActionColumn'],
            ],
        ]); ?>
    
    <?php Pjax::end(); ?>
    
</div>
