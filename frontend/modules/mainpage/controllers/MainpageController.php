<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 03.05.2016
 * Time: 14:07
 */

namespace frontend\modules\mainpage\controllers;


use common\classes\AdsCategory;
use common\classes\Debug;
use yii\base\Controller;
use yii\filters\AccessControl;
use frontend\modules\adsmanager\models\Ads;

class MainpageController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [

                        'roles' => ['?','@'],
                        'allow' => true,
                    ],

                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->andWhere(['status' => [2,4]]);
        $query
            ->with('ads_img')
            ->groupBy('`ads`.`id`')
            ->orderBy('dt_update DESC')
            ->limit(16)
            ->with('adsDopStatus');

        $ads = $query->all();

        return $this->render('index',['ads'=>$ads]);
    }

}