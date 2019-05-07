<?php
/**
 * Created by PhpStorm.
 * User: KING
 * Date: 03.05.2016
 * Time: 14:07
 */

namespace frontend\modules\mainpage\controllers;


use common\classes\AdsCategory;
use common\classes\Debug;
use frontend\modules\adsmanager\models\Ads;
use yii\base\Controller;
use yii\filters\AccessControl;
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
                        'roles' => ['?', '@'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $arr = Ads::getAllAds();

        //$category = AdsCategory::getAllCategory();
        //Debug::prn($category);

        return $this->render('index', ['arr' => $arr]);
    }

    public function actionLoadCards()
    {
        if (Yii::$app->request->isAjax) {
            $arr = Ads::getAllAds();
            if($arr['ads'])
                return $this->renderPartial('_cards', ['products' => $arr['ads']]);
            else
                return false;
        }
    }

}