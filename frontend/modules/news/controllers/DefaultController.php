<?php

namespace frontend\modules\news\controllers;

use backend\modules\news\models\News;
use backend\modules\news\models\NewsSearch;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `news` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionView($slug){
        $model = News::findOne(['slug' => $slug]);
        News::updateAllCounters(['views' => 1], ['id' => $model->id] );
        return $this->render('view',['model' => $model]);
    }
}
