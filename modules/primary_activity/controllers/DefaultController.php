<?php

namespace app\modules\primary_activity\controllers;

use yii\web\Controller;

/**
 * Default controller for the `primary-activity` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
