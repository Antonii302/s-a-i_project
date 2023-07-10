<?php

use yii\helpers\Html;

?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Inventory ID</th>
            <th>Product ID</th>
            <!-- Add more column headers as needed -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model): ?>
            
            <tr>
                <td><?= Html::encode($model->id) ?></td>
                <td><?= Html::encode($model->inventory_id) ?></td>
                <td><?= Html::encode($model->product_id) ?></td>
                <!-- Add more table cells for each column -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>