<?php

namespace app\modules\Admin;

use app\components\Module\Module;

/**
 * admin module definition class
 */
class Admin extends Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\Admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

}