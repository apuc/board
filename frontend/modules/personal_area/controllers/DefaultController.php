<?php

namespace frontend\modules\personal_area\controllers;

use yii\web\Controller;

/**
 * Default controller for the `personal_area` module
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
