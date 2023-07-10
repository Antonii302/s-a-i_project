<?php

namespace app\modules\primary_activity\controllers;

use Yii;

use yii\web\Response;

use app\models\ProductsInventory;
use app\modules\primary_activity\models\ProductsInventorySearch;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

class ProductsInventoryController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new ProductsInventorySearch();

        if (Yii::$app->request->isAjax) {
            $queryParams = Yii::$app->request->queryParams;
            if ($searchModel->load(Yii::$app->request->queryParams)) {
                $dataProvider = $searchModel->search($queryParams);

                return $this->renderPartial('sections/_main', [
                    'models' => $dataProvider->getModels()
                ]);
            }

            try {

            } catch (Exception $exception) {

            }
        }

        return $this->render('index', ['searchModel' => $searchModel]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductsInventory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ProductsInventory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
