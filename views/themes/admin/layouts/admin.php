<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\modules\User\urls\UserUrl;
use app\modules\Admin\urls\AdminUrl;
use app\views\themes\admin\assets\AdminAssetBundle;
use app\modules\Admin\widgets\AdminMenu\AdminMenuWidget;
use app\components\NotificationHelper\NotificationHelper;

AdminAssetBundle::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php $this->head() ?>
</head>
<body class="theme-green">
    <?php $this->beginBody() ?>
    
    <?= NotificationHelper::displayNotifications() ?>
    
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons"><?= Yii::t('app', 'search') ?></i>
        </div>
        <input type="text" placeholder="<?= Yii::t('app', 'START TYPING') ?>...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= AdminUrl::getDashboardUrl() ?>"><?= Yii::t('app', 'Admin panel') ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <li>
                        <a href="<?= UserUrl::getLogoutUrl() ?>"><i class="material-icons">power_settings_new</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?= AdminMenuWidget::widget() ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">colesnic89</a>
                </div>
                <div class="version">
                    <b><?= Yii::t('app', 'Version') ?>: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header admin-header">
                <h1><?= $this->title ?></h1>
            </div>
            <div>
                <?= $content ?>
            </div>
        </div>
    </section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>