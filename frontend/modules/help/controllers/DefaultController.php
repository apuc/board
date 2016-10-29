<?php

namespace frontend\modules\help\controllers;

use backend\modules\category_help\models\CategoryHelp;
use yii\web\Controller;

/**
 * Default controller for the `help` module
 */
class DefaultController extends Controller
{
    public $layout = 'page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $category = CategoryHelp::find()->all();
        $c = [];
        foreach($category as $item){
            /*$c[$item->id] = */
        }
        return $this->render('index');
    }
}
