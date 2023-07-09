<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductsInventory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Product_id')->textInput() ?>

    <?= $form->field($model, 'current_quantity')->textInput() ?>

    <?= $form->field($model, 'date_expiry')->textInput() ?>

    <?= $form->field($model, 'PurchaseDetails_id')->textInput() ?>

    <?= $form->field($model, 'extra_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Inventory_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
