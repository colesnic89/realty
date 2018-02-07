<?php

namespace app\components\DatePicker;

use kartik\date\DatePicker as KartikDatePicker;

class DatePicker extends KartikDatePicker
{
    
    public $defaultPluginOptions = [
        'format' => 'dd.mm.yyyy',
        'todayHighlight' => true,
        'autoclose' => true,
    ];

    public function init()
    {
        parent::init();
        $this->options = array_merge_recursive($this->defaultPluginOptions, $this->options);
    }
    
}