<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\primary_activity\models\ProductsInventorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Product_id') ?>

    <?= $form->field($model, 'current_quantity') ?>

    <?= $form->field($model, 'date_expiry') ?>

    <?= $form->field($model, 'PurchaseDetails_id') ?>

    <?php // echo $form->field($model, 'extra_details') ?>

    <?php // echo $form->field($model, 'Iventory_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
