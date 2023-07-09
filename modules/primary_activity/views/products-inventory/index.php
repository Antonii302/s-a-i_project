<?php

use app\models\Inventory;
use app\models\ProductsInventory;

use yii\web\JsExpression;

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap4\Modal;

use yii\grid\ActionColumn;
use yii\grid\GridView;

use kartik\form\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = 'Lista de registros';

$this->params['breadcrumbs'][] = [
    'label' => 'Panel de control',
    'url' => Url::home()
];
$this->params['breadcrumbs'][] = $this->title;

$this->params['pageDetails']['description'] = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolorum sint assumenda dignissimos asperiores adipisci? Voluptatum deleniti debitis tempore molestiae vero nemo ea animi. Labore, autem aperiam. Eius, soluta temporibus.';
$this->params['pageDetails']['project_history'] = [
    'datetime' => '15 de agosto del 2014, 07:39 AM',
    'lastActivity' => 'Creación de ...',
    'httpMethod' => 'POST'
];

$records = [
    'inventories' => ArrayHelper::map(Inventory::find()->all(), 'id', 'name')
];
?>

<div class="products-inventory-index">
    <!-- Card -->
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex" style="gap: 0 18px;">
                <?php $form = ActiveForm::begin([
                    'id' => 'searchRecords',
                    'action' => ['index'],
                    'method' => 'GET',
                    'type' => ActiveForm::TYPE_VERTICAL,
                    'enableClientValidation' => false,
                    'options' => [
                        'style' => 'max-width: 250px;',
                        'class' => 'flex-fill'
                    ],
                    'formConfig' => [
                        'showLabels' => false,
                        'showErrors' => false,
                    ],
                    'fieldConfig' => ['autoPlaceholder' => true]
                ]) ?>
                <?= $form->field($searchModel, 'Inventory_id')->widget(Select2::class, [
                    'theme' => Select2::THEME_MATERIAL,
                    'pluginOptions' => [
                        'width' => '100%',
                        'dropdownCssClass' => 'mt-2'
                    ],
                    'hideSearch' => true,
                    'options' => ['style' => 'max-width: 5px'],
                    'data' => $records['inventories']
                ]) ?>
                <?php ActiveForm::end() ?>
                <span role="button" data-toggle="popover" data-container="body" title="Filtro por inventario" data-content="Los registros a visualizar serán aquellos asociados a un inventario determinado" class="align-self-start text-sm text-gray">
                    <span class="flex-shrink-0 d-none d-md-inline-block">Ayuda</span>
                    <i class="far fa-question-circle"></i>
                </span>
            </div><!-- /.d-flex -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div><!-- ./products-inventory-index -->