<?php

namespace app\views\themes\admin;

use Yii;
use app\components\Theme\Theme;

class AdminTheme extends Theme
{
    
    public function init()
    {
        $this->pathMap = [
            '@app/views' => '@app/views/themes/admin',
        ];
        
        parent::init();
    }

    public function getThemePath()
    {
        return Yii::getAlias('@app/views/themes/admin/');
    }

    public function getThemeLayoutsPath()
    {
        return Yii::getAlias('@app/views/themes/admin/layouts/');
    }
    
    public static function getThemeSourcePath()
    {
        return Yii::getAlias('@app/views/themes/admin/assets/files');
    }

}