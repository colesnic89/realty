<?php

namespace app\modules\User;

use app\components\Module\Module;

/**
 * User module definition class
 */
class User extends Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\User\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

}