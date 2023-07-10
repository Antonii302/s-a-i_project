<?php

use yii\helpers\Html;

use yii\bootstrap4\Breadcrumbs;

$this->registerCss(<<<CSS
    .content-wrapper > *:not(#nprogress) { display: none; }
CSS);
?>

<div class="content-wrapper" style="background-color: #fff;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php if (isset($this->params['breadcrumbs'])) : ?>
            <div class="d-flex" style="gap: 0 18px;">
                <?php echo Breadcrumbs::widget([
                    'homeLink' => false,
                    'links' => $this->params['breadcrumbs'],
                    'activeItemTemplate' => '<li class="breadcrumb-item active text-dark" aria-current="page">{link}</li>',
                    'options' => ['class' => 'breadcrumb']
                ]) ?>
                <span role="button" data-toggle="modal" data-target="#" class="flex-shrink-0 align-self-center text-gray">
                    <span class="d-none d-lg-inline-block small">Ayuda</span>
                    <i class="fas fa-info-circle"></i>
                </span>
            </div><!-- /.d-flex -->
        <?php endif ?>

        <?php if (isset($this->params['pageDetails'])) : ?>
            <!-- Alert -->
            <div role="alert" class="alert mt-1 mt-sm-2 alert-default-primary">
                <p class="mb-2 text-sm"><i class="fas fa-comment-dots"></i></p>
                <!-- Container fluid -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-7">
                            <p class="mb-0 text-justify text-sm text-dark">
                                <?= $this->params['pageDetails']['description'] ?>
                            </p>
                        </div><!-- /.col -->
                        <div class="col mt-2 mt-sm-0">
                            <?php
                            [
                                'datetime' => $datetime,
                                'lastActivity' => $lastActivity,
                                'httpMethod' => $httpMethod,
                            ] = $this->params['pageDetails']['project_history']
                            ?>
                            <div class="d-flex" style="gap: 0 18px;">
                                <small class="text-gray">
                                    <i class="far fa-clock"></i> <?= $datetime ?>
                                </small>
                                <span role="button" data-toggle="popover" data-container="body" title="Historial del proyecto" data-content="Acá podrás observar información sobre la última actividad registrada en esta página" class="flex-shrink-0 text-gray">
                                    <span class="d-none d-lg-inline-block small">Ayuda</span>
                                    <i class="far fa-question-circle"></i>
                                </span>
                            </div><!-- /.d-flex -->
                            <div class="w-100 d-flex mt-1 mt-md-2" style="gap: 0 6px;">
                                <span class="align-self-start badge p-1 badge-dark">
                                    <?= $httpMethod ?>
                                </span>
                                <p class="mb-3 flex-shrink-1 text-sm text-dark">
                                    <?= $lastActivity ?><?= $lastActivity ?>
                                </p>
                            </div><!-- /.d-flex -->

                            <?= Html::a('<i class="fas fa-external-link-alt"></i> Actividad en ésta página', [''], [
                                'class' => 'alert-link text-sm'
                            ]) ?>
                        </div><!-- /.col -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.alert-primary -->
        <?php endif ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>