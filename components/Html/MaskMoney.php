<?php

namespace app\components\Html;

use kartik\money\MaskMoney as KartikMaskMoney;

class MaskMoney extends KartikMaskMoney
{
    public function init()
    {
        parent::init();
    }
}