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

class MainpageController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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

        $category = AdsCategory::getAllCategory();
        //Debug::prn($category);

        return $this->render('index',['category' => $category]);
    }

}