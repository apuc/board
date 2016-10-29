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
            if($item->parent_id == 0){
                $c[$item->id]['name'] = $item->name;
            }
            else {
                $c[$item->parent_id]['child'][$item->id] = $item->name;
            }

        }
        return $this->render('index', [
            'category' => $c,
        ]);
    }

    public function actionView($slug){
        Help::updateAllCounters(['views'=>1],['slug'=>$slug]);
        Debug::prn($slug);
    }
}
