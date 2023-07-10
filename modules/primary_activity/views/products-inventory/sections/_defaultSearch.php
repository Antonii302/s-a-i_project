<?php

use app\models\Inventory;

use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;

use kartik\select2\Select2;

$records = ['inventories' => ArrayHelper::map(Inventory::find()->all(), 'id', 'name')];

?>
<div class="default-search flex-fill" style='max-width: 250px;'>
    <?php $form = ActiveForm::begin([
        'id' => 'defaultSearch',
        'action' => ['index'],
        'method' => 'GET',
        'type' => ActiveForm::TYPE_VERTICAL,
        'enableClientValidation' => false,
        'options' => [
            'autocomplete' => 'off',
        ],
        'formConfig' => [
            'showLabels' => false,
            'showErrors' => false,
        ],
    ]) ?>
    <?= $form->field($model, 'inventory_id')->widget(Select2::class, [
        'theme' => Select2::THEME_MATERIAL,
        'pluginOptions' => [
            'width' => '100%',
            'dropdownCssClass' => 'mt-2'
        ],
        'hideSearch' => true,
        'options' => ['id' => 'inventory_id', 'style' => 'max-width: 5px'],
        'data' => $records['inventories']
    ]) ?><!-- /.form-field -->
    <?php ActiveForm::end() ?>
</div>