<?php

use yii\bootstrap4\Breadcrumbs;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php if (isset($this->params['breadcrumbs'])) : ?>
            <!-- Card -->
            <div class="card">
                <div class="card-body p-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-11">
                                <?php echo Breadcrumbs::widget([
                                    'options' => [
                                        'class' => 'breadcrumb float-left'
                                    ],
                                    'homeLink' => false,
                                    'links' => $this->params['breadcrumbs']
                                ]) ?>
                            </div><!-- /.col -->
                            <div class="col">

                            </div><!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php if (isset($this->params['pageDescription'])) : ?>
                                    <p class="mt-1 mb-0 text-sm"><?= $this->params['pageDescription'] ?></p>
                                <?php endif ?>
                            </div><!-- /.col -->
                        </div>
                    </div><!-- /.container-fluid -->
                </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        <?php endif ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>