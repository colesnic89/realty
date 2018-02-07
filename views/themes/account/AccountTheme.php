<?php

namespace app\views\themes\account;

use Yii;
use app\components\Theme\Theme;

class AccountTheme extends Theme
{
    
    public function init()
    {
        $this->pathMap = [
            '@app/views' => '@app/views/themes/account',
        ];
        
        parent::init();
    }

    public function getThemePath()
    {
        return Yii::getAlias('@app/views/themes/account/');
    }

    public function getThemeLayoutsPath()
    {
        return Yii::getAlias('@app/views/themes/account/layouts/');
    }
    
    public static function getThemeSourcePath()
    {
        return Yii::getAlias('@app/views/themes/account/assets/files');
    }

}