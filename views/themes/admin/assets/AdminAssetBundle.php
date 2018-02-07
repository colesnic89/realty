<?php

namespace app\views\themes\admin\assets;

use yii\web\AssetBundle;
use app\views\themes\admin\AdminTheme;

class AdminAssetBundle extends AssetBundle
{

    public $css = [
        'css/theme.css',
        'css/waves.min.css',
        'css/animate.min.css',
        'css/all-themes.css',
        'css/style.css',
    ];

    public $js = [
        'js/waves.min.js',
        'js/jquery.slimscroll.js',
        'js/admin.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public function init()
    {
        $this->sourcePath = AdminTheme::getThemeSourcePath();
        parent::init();
    }

}