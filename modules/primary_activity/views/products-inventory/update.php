<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductsInventory $model */

$this->title = 'Update Products Inventory: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
