<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 14.11.17
 * Time: 16:18
 */

namespace frontend\modules\personal_area\controllers;

use frontend\modules\personal_area\models\UserScoreSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
class ScoreController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserScoreSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }
}