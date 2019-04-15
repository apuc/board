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
use Yii;

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
            ->with('adsDopStatus')
            ->with('geobase_city')
            ->with('geobase_region')
            ->with('ads_fields_value.fieldName')
            ->with('categoryAds')
            ->groupBy('`ads`.`id`')
            ->orderBy(['top'=>SORT_DESC,'dt_update'=>SORT_DESC,])
            ->limit(16);

        if(Yii::$app->request->isAjax)
        {
            $offset = Yii::$app->request->post('offset');
            $query->offset($offset);
            $ads = $query->all();

            return $this->renderPartial('ads-card.php',["ads"=>$ads]);
        }

        $ads = $query->all();

        return $this->render('index',['ads'=>$ads]);
    }

}