<?php

use yii\widgets\Pjax;
use app\components\Html\Html;
use app\models\User\UserTypeEnum;
use app\models\User\UserStatusEnum;
use app\components\Date\DateHelper;
use app\components\GridView\GridView;
use app\components\DatePicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\User\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\User\User */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">

    <div class="white-block">
        <?= Html::createLink(Yii::t('app', 'Create user'), ['create']) ?>
    </div>

    <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'Email:email',
                'NickName',
                'FirstName',
                'LastName',
                [
                    'attribute' => 'RegistrationDate',
                    'value' => function($model) {
                        return DateHelper::format($model->RegistrationDate);
                    },
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'RegistrationDate',
                    ]),
                ],
                [
                    'attribute' => 'Type',
                    'value'     => function($model) {
                        return UserTypeEnum::getName($model->Type);
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'Type', UserTypeEnum::getList(false, '-'), ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'Status',
                    'value'     => function($model) {
                        return UserStatusEnum::getName($model->Status);
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'Status', UserStatusEnum::getList(false, '-'), ['class' => 'form-control']),
                ],
                ['class' => 'app\components\GridView\ActionColumn'],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
