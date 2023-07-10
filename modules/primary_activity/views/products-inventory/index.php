<?php

use app\models\Inventory;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\web\View;

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

$records = ['inventories' => ArrayHelper::map(Inventory::find()->all(), 'id', 'name')];

?>
<div class="products-inventory-index">
    <div class="d-flex" style="gap: 0 12px;">
        <?= $this->render('sections/_defaultSearch', ['model' => $searchModel]) ?>
        <span role="button" data-toggle="popover" data-container="body" title="Filtro por inventario" data-content="Los registros a visualizar serán aquellos asociados a un determinado inventario" class="flex-shrink-0 align-self-start text-gray">
            <span class="d-none d-lg-inline-block small">Ayuda</span>
            <i class="far fa-question-circle"></i>
        </span>
    </div><!-- /.d-flex -->
    <div class="main"></div>
</div><!-- ./products-inventory-index -->

<!-- JavaScript -->
<?php $this->registerJs(<<< JS
    NProgress.configure({ 
        parent: '.content-wrapper',
        showSpinner: false,
    });

    $(document).ready(() => {
        const searchRecords = () => {
            NProgress.start();
            $('.content-wrapper > *:not(#nprogress)').fadeOut(0);

            const \$form = $('#defaultSearch');

            const action = \$form.attr('action');
            const method = \$form.attr('method');

            $.ajax({
                url: action,
                type: method,
                data: \$form.serialize()
            }).done((response) => {
                console.log(response);
                $('.main').html(response)
            }).fail((xhr, status, error) => {
                console.log('fail');
            }).always(() => {
                $('.content-wrapper > *:not(#nprogress)').fadeIn(200);
                NProgress.done();
            });
        };
        searchRecords();

        $('#inventory_id').on('change', searchRecords);
    });
JS, View::POS_END) ?>
<!-- /.javaScript -->