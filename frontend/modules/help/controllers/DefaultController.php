<?php

namespace frontend\modules\help\controllers;

use backend\modules\category_help\models\CategoryHelp;
use common\classes\Debug;
use common\models\db\Help;
use yii\web\Controller;

/**
 * Default controller for the `help` module
 */
class DefaultController extends Controller
{
    //public $layout = 'page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $list = Help::find()->orderBy('views DESC')->limit(10)->all();
        return $this->render('index', [
            'list' => $list,
            'title' => 'Часто просматриваемые'
        ]);
    }

    public function actionView($slug){
        Help::updateAllCounters(['views'=>1],['slug'=>$slug]);
        return $this->render('view',[
            'article' => Help::find()->where(['slug'=>$slug])->one(),
        ]);
    }

    public function actionCategory($id){
        $list = Help::find()->where(['category_id'=>$id])->orderBy('views DESC')->limit(10)->all();
        return $this->render('index', [
            'list' => $list,
            'title' => CategoryHelp::find()->where(['id'=>$id])->one()->name,
        ]);
    }
}
