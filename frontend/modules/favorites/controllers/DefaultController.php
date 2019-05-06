<?php

namespace frontend\modules\favorites\controllers;


use common\classes\Debug;

use frontend\modules\favorites\models\Favorites;
use yii\web\Controller;

/**
 * Default controller for the `favorites` module
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


    public function actionAdd_favorites(){
        $favorites = new Favorites();
        $favorites->user_id = \Yii::$app->user->id;
        $favorites->gist = $_POST['gist'];
        $favorites->gist_id = $_POST['gistId'];
        $favorites->save();
    }

    public function actionDel_favorites(){
        Favorites::deleteAll(['gist' => $_POST['gist'], 'gist_id' => $_POST['gistId'], 'user_id' => \Yii::$app->user->id]);
    }
}
