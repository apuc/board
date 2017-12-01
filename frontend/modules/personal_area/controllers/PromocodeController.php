<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 14.11.17
 * Time: 16:18
 */

namespace frontend\modules\personal_area\controllers;

use common\classes\Debug;
use frontend\modules\personal_area\models\UserScoreSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
class PromocodeController extends Controller
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
        return $this->render('form-code');
    }

    public function actionAdd()
    {
        Debug::prn(\Yii::$app->request->post());
    }
}