<?php

namespace app\modules\User\widgets;

use Yii;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\Admin\urls\AdminUrl;

class UserDropdownWidget extends Select2
{
    
    public function init()
    {
        $this->defaultPluginOptions = [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting ...'; }"),
            ],
            'ajax' => [
                'url' => AdminUrl::getUserSearchUrl(),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {searchString:params.term}; }'),
            ],
        ];
        
        $this->options = ArrayHelper::merge([
            'placeholder' => Yii::t('app', 'Please enter username, email or ID'),
        ], $this->options);
        
        parent::init();
    }
    
}