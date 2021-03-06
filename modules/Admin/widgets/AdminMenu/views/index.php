<?php

    use app\modules\Admin\urls\AdminUrl;

?>

<div class="menu">
    <ul class="list">
        <li class="header"><?= Yii::t('app', 'MAIN NAVIGATION') ?></li>
        <li class="active">
            <a href="<?= AdminUrl::getDashboardUrl() ?>">
                <i class="material-icons">home</i>
                <span><?= Yii::t('app', 'Home') ?></span>
            </a>
        </li>
        <li>
            <a href="<?= AdminUrl::getUsersManagmentUrl() ?>">
                <i class="material-icons">group</i>
                <span><?= Yii::t('app', 'Users managment') ?></span>
            </a>
        </li>
        <li>
            <a href="<?= AdminUrl::getObjectsManagmentUrl() ?>">
                <i class="material-icons">home</i>
                <span><?= Yii::t('app', 'Object managment') ?></span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">widgets</i>
                <span>Widgets</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Cards</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/widgets/cards/basic.html">Basic</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/cards/colored.html">Colored</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/cards/no-header.html">No Header</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Infobox</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                        </li>
                        <li>
                            <a href="../../pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>