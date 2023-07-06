<?php

use app\components\Menu;
use yii\bootstrap4\Modal;

$currentController = Yii::$app->controller->id;
$currentAction = Yii::$app->controller->action->id;
?>

<aside class="main-sidebar sidebar-light-purple elevation-2">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'Panel de control',
                        'target' => '_self',
                        'active' => ($currentController === 'site' && $currentAction === 'index'),
                        'iconClass' => 'nav-icon fas fa-tachometer-alt',
                        'url' => ['/site/index']
                    ], // * nav-item
                    ['header' => 'true', 'label' => 'Actividad principal'], // * nav-header
                    [
                        'label' => 'Inventario de productos',
                        'target' => '_self',
                        'active' => ($currentController === 'products-inventory'),
                        'iconClass' => 'nav-icon fas fa-th',
                        'url' => ['/primary-activity/products-inventory/index']
                    ], // * nav-item
                    ['header' => 'true', 'label' => 'Estado del proyecto'], // * nav-header
                    [
                        'label' => 'Gii',
                        'target' => '_blank',
                        'iconClass' => 'nav-icon fas fa-bug',
                        'url' => ['/gii'],
                    ], // * nav-item
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>