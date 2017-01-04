<?php

namespace frontend\modules\organizations\controllers;

use common\classes\Debug;
use yii\web\Controller;

/**
 * Default controller for the `organizations` module
 */
class DefaultController extends Controller
{

    public $layout = 'organizations';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){
        return $this->render('add');
    }
}
