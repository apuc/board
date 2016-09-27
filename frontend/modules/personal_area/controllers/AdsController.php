<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.09.2016
 * Time: 16:11
 */

namespace frontend\modules\personal_area\controllers;




use common\classes\Debug;
use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;

class AdsController extends Controller
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

    public function actionAds_user_active(){
        //$ads = Ads::find()->where(['status' => [2,4], 'user_id' => \Yii::$app->user->id])->all();

        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [2,4], '`ads`.`user_id`' => \Yii::$app->user->id])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')


            ->all();
        $request = Yii::$app->request;
        return $this->render('ads-active', ['ads' => $ads, 'pagination' => $pagination, 'request' => $request]);
    }

    public function actionAds_user_not_active(){
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [5], '`ads`.`user_id`' => \Yii::$app->user->id])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')


            ->all();
        $request = Yii::$app->request;
        return $this->render('ads-not-active', ['ads' => $ads, 'pagination' => $pagination, 'request' => $request]);
    }

    public function actionAds_user_moder(){
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [1], '`ads`.`user_id`' => \Yii::$app->user->id])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')


            ->all();

        return $this->render('moder', ['ads' => $ads, 'pagination' => $pagination]);
    }

    public function actionDelete(){
        $request = Yii::$app->request;
        Ads::updateAll(['status' => 3], ['id' => $request->post('id')]);
        if($request->post('ads') == 'active'){
            $url = 'ads_user_active';
        }
        else{
            $url = 'ads_user_not_active';
        }
        Yii::$app->session->setFlash('success','Объявление успешно удалено.');
        return $this->redirect([$url, 'page' => $request->post('page')]);
    }

    public function actionRemove_publication(){
        $request = Yii::$app->request;
        Ads::updateAll(['status' => 5], ['id' => $request->post('id')]);

        Yii::$app->session->setFlash('success','Объявление снято с публикации.');
        return $this->redirect(['ads_user_active', 'page' => $request->post('page')]);
    }

    public function actionPublication(){
        $request = Yii::$app->request;
        Ads::updateAll(['status' => 2, 'dt_update' => time()], ['id' => $request->post('id')]);

        Yii::$app->session->setFlash('success','Объявление опубликованно.');
        return $this->redirect(['ads_user_not_active', 'page' => $request->post('page')]);
    }


}