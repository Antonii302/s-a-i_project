<?php

use yii\bootstrap4\Breadcrumbs;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if (isset($this->params['breadcrumbs'])) : ?>
        <div class="content-header">
            <!-- Card -->
            <div class="card rounded-0">
                <div class="card-body p-2">
                    <div class="d-flex" style="gap: 0 18px;">
                        <?php echo Breadcrumbs::widget([
                            'options' => ['class' => 'breadcrumb'],
                            'homeLink' => false,
                            'links' => $this->params['breadcrumbs']
                        ]) ?>
                        <span role="button" data-toggle="modal" data-target="#" class="flex-shrink-0 align-self-center text-sm text-purple">
                            <span class="d-none d-sm-inline-block">Ayuda</span>
                            <i class="far fa-question-circle"></i>
                        </span>
                    </div><!-- /.d-flex -->
                    <?php
                    if (isset($this->params['pageDetails'])) :
                        [
                            'datetime' => $datetime,
                            'lastActivity' => $lastActivity,
                            'httpMethod' => $httpMethod,
                        ] = $this->params['pageDetails']['project_history'];
                    ?>
                        <!-- Container fluid -->
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-sm-8">
                                    <p class="mb-0 text-justify text-sm text-dark">
                                        <?= $this->params['pageDetails']['description'] ?>
                                    </p>
                                </div><!-- /.col -->
                                <div class="col mt-3 mt-sm-0">
                                    <div class="d-flex w-100" style="gap: 0 18px;">
                                        <p class="mb-0 text-sm text-gray">
                                            <i class="far fa-clock"></i>
                                            <?= $datetime ?>
                                        </p>
                                        <span role="button" data-toggle="popover" data-container="body" title="Historial del proyecto" data-content="Última actividad registrada en esta página" class="flex-shrink-0 text-sm text-gray">
                                            <span class="d-none d-lg-inline-block">Ayuda</span>
                                            <i class="far fa-question-circle"></i>
                                        </span>
                                    </div><!-- /.d-flex -->
                                    <div class="d-flex w-100 mt-1" style="gap: 0 8px;">
                                        <span class="align-self-start badge badge-dark"><?= $httpMethod ?></span>
                                        <small class="flex-shrink-1 text-dark"><?= $lastActivity ?></small>
                                    </div><!-- /.d-flex -->
                                </div><!-- /.col -->
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    <?php endif ?>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    <?php endif ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>