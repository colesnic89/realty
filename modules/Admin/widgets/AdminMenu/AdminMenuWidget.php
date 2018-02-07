<?php

namespace app\modules\Admin\widgets\AdminMenu;

use Yii;
use yii\widgets\Menu;
use yii\bootstrap\Widget;
use app\modules\Admin\urls\AdminUrl;

class AdminMenuWidget extends Widget
{
    
    public function run()
    {
        return $this->render('index');
    }
    
}