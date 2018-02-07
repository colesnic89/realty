<?php

namespace app\modules\HomePage;

use app\components\Module\Module;

/**
 * home page module definition class
 */
class HomePage extends Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\HomePage\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

}