<?php

namespace app\views\themes\basic;

use Yii;
use app\components\Theme\Theme;

class BasicTheme extends Theme
{
    
    public function init()
    {
        $this->pathMap = [
            '@app/views' => '@app/views/themes/basic',
        ];
        
        parent::init();
    }

    public function getThemePath()
    {
        return Yii::getAlias('@app/views/themes/basic/');
    }

    public function getThemeLayoutsPath()
    {
        return Yii::getAlias('@app/views/themes/basic/layouts/');
    }
    
    public static function getThemeSourcePath()
    {
        return Yii::getAlias('@app/views/themes/basic/assets/files');
    }

}