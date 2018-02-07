<?php

namespace app\views\themes\basic\assets;

use Yii;
use yii\web\AssetBundle;
use app\views\themes\basic\BasicTheme;

class BasicAssetBundle extends AssetBundle
{

    public $css = [
        'css/theme.css',
    ];

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    public function init()
    {
        $this->sourcePath = BasicTheme::getThemeSourcePath();
        parent::init();
    }

}