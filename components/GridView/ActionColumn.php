<?php

namespace app\components\GridView;

use app\components\Html\Html;
use kartik\grid\ActionColumn as KartikActionColumn;

class ActionColumn extends KartikActionColumn
{
    
    public $showViewButton = false;

    public function init()
    {
        parent::init();
        $this->width = '140px';
        $this->setActionButtons();
    }
    
    public function setActionButtons()
    {
        $this->buttons = [
            'view' => function ($url, $model) {
                return Html::a(Html::tag('i', 'remove_red_eye', ['class' => 'material-icons col-cyan']), $url, ['data-pjax' => 0]);
            },
            'update' => function ($url, $model) {
                return Html::a(Html::tag('i', 'edit', ['class' => 'material-icons col-orange']), $url, ['data-pjax' => 0]);
            },
            'delete' => function ($url, $model) {
                return Html::a(Html::tag('i', 'delete_forever', ['class' => 'material-icons text-danger']), $url, ['data-pjax' => 0]);
            },
        ];
        $this->template =  ($this->showViewButton ? '{view}&nbsp;&nbsp;' : '') . '{update}&nbsp;&nbsp;{delete}';
    }
    
}