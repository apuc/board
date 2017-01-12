<?php

namespace backend\modules\category_org\controllers;

use yii\web\Controller;

/**
 * Default controller for the `category_org` module
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
