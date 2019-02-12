<?php

namespace frontend\modules\adsmanager\controllers;




use common\classes\AdsCategory;
use common\classes\Debug;

use common\classes\UserFunction;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\AdsFieldsValue;
use common\models\db\AdsImg;
use common\models\db\CategoryGroupAdsFields;
use common\models\db\GeobaseCity;
use common\models\db\Profile;
use common\models\User;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\adsmanager\models\UrlRateLimiter;
use frontend\modules\favorites\models\Favorites;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\RateLimiter;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class AdsmanagerController extends Controller
{
    //public $layout = 'page';

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
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'user_ads'],
                        'roles' => ['?'],
                    ],
                ],
            ],

            'rateLimiter' => [
                'class' => RateLimiter::className(),
                'enableRateLimitHeaders' => false, // не передавать в хедере оставш. кол-во запросов и время
                'errorMessage' => 'Слишком много запросов',
                'only' => ['index'], // Определить экшн для применения
                'user' => new UrlRateLimiter(),
            ],

        ];
    }


    public function actionIndex(){
        if(isset($_GET['slug'])){
            $id = AdsCategory::getIdCategory($_GET['slug']);
            $parentList = AdsCategory::getParentAllCategory($id);

            if(empty($parentList)){
                $parentList = $id;
            }

            $arr = Ads::getAllAds($parentList);
        }
        else{
            $arr = Ads::getAllAds();
        }

        return $this->render('index',
            [
                'ads' => $arr['ads'],
                'pagination' => $arr['pagination'],
            ]);
    }


    public function actionCreate()
    {
        $model = new Ads();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(!empty($_POST['AdsField'])){
                \common\classes\Ads::saveAdsFields($_POST['AdsField'], $model->id);
            }

            //AdsImg::updateAll(['ads_id' => $model->id], ['ads_id' => 1, 'user_id' => Yii::$app->user->id]);
            if (!file_exists('media/users/' . Yii::$app->user->id)) {
                mkdir('media/users/' . Yii::$app->user->id . '/');
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb')) {
                mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb');
            }

            $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
            $dirThumb = $dir . 'thumb/';

            $i = 0;

            if (!empty($_FILES['file']['name'][0])) {

                foreach ($_FILES['file']['name'] as $file) {
                    Image::watermark($_FILES['file']['tmp_name'][$i],
                        $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/img/logo_watermark.png')
                        ->save($dir . $_FILES['file']['name'][$i], ['quality' => 100]);

                    Image::thumbnail($_FILES['file']['tmp_name'][$i], 142, 100,
                        $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                        ->save($dirThumb . $file, ['quality' => 100]);

                    $img = new AdsImg();
                    $img->ads_id = $model->id;
                    $img->img = Url::home(true) . $dir . $file;
                    $img->img_thumb = Url::home(true) . $dirThumb . $file;
                    $img->user_id = Yii::$app->user->id;
                    $img->save();
                    $i++;
                }
            }

            $subject = 'Новое объявление';
            Yii::$app->mailer->compose('ads/add',['product'=>$model])
                ->setTo($model->mail)
                ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                ->setSubject($subject)
                ->send();

            Yii::$app->session->setFlash('success','Объявление успешно сохранено. После прохождения модерации оно будет опубликованно.');


            return $this->redirect('/personal_area/ads/ads_user_moder');
        } else {

            $geoInfo = \common\classes\Address::get_geo_info();
            $model->region_id = $geoInfo['region_id'];
            $model->city_id = $geoInfo['city_id'];
            $userInfo = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();

            if(!empty($userInfo->name)){
                $model->name = $userInfo->name;
            }

            if(!empty($userInfo->public_email)){
                $model->mail = $userInfo->public_email;
            }
            else{
                $model->mail = User::find()->where(['id' => Yii::$app->user->id])->one()->email;
            }

            $city = GeobaseCity::find()
                ->select([
                    '`geobase_city`.`name` as value',
                    '`geobase_city`.`name` as  label',
                    '`geobase_city`.`id` as id',
                    '`geobase_region`.`name` as region_name',
                    '`geobase_region`.`id` as region_id'
                ])
                ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
                ->orderBy('`geobase_region`.`name`')
                ->addOrderBy('`geobase_city`.`name`')
                ->asArray()
                ->all();

            $i = 0;
            $data = [];
            foreach ($city as $item) {
                $data[$item['region_name']][$item['id']] = $item['value'];
            }


            return $this->render('ads_add/add',
                [
                    'model' => $model,
                    'geoInfo' => $geoInfo,
                    'arraregCity' => $data,
                    'user' => $userInfo,
                ]);
        }
    }

    public function actionUpdate($id){
        $this->layout = 'main';
        $model = Ads::find()
            ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['`ads`.`id`' => $id])
            ->with('ads_fields_value','user','ads_img','geobase_city')
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            AdsFieldsValue::deleteAll(['ads_id' => $model->id]);
            if(!empty($_POST['AdsField'])) {
                \common\classes\Ads::saveAdsFields($_POST['AdsField'], $model->id);
            }
            //AdsImg::updateAll(['ads_id' => $model->id], ['ads_id' => 1, 'user_id' => Yii::$app->user->id]);
            if (!file_exists('media/users/' . Yii::$app->user->id)) {
                mkdir('media/users/' . Yii::$app->user->id . '/');
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb')) {
                mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb');
            }

            $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
            $dirThumb = $dir . 'thumb/';

            $i = 0;

            if (!empty($_FILES['file']['name'][0])) {

                foreach ($_FILES['file']['name'] as $file) {
                    Image::watermark($_FILES['file']['tmp_name'][$i],
                        $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/img/logo_watermark.png')
                        ->save($dir . $_FILES['file']['name'][$i], ['quality' => 100]);

                    Image::thumbnail($_FILES['file']['tmp_name'][$i], 142, 100,
                        $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                        ->save($dirThumb . $file, ['quality' => 100]);

                    $img = new AdsImg();
                    $img->ads_id = $model->id;
                    $img->img = Url::home(true) . $dir . $file;
                    $img->img_thumb = Url::home(true) . $dirThumb . $file;
                    $img->user_id = Yii::$app->user->id;
                    $img->save();
                    $i++;
                }
            }
            Yii::$app->session->setFlash('success','Объявление успешно сохранено. После прохождения модерации оно будет опубликованно.');
            return $this->redirect('/personal_area/ads/ads_user_moder');
        } else {
            if($model->status == 3 || $model->status == 1){
                return $this->render('view/error', ['model' => $model]);
            }
            if($model->user_id != Yii::$app->user->id){
                return $this->render('view/error-ads-not-user', ['model' => $model]);
            }

            $category = $categoryList = AdsCategory::getListCategory($model->category_id,[]);

            //Debug::prn($category);
            $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $model->category_id])->one();
            $html = '';
            if(!empty($groupFieldsId)){
                $groupFieldsId = $groupFieldsId->group_ads_fields_id;

                $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();


                //if()
                foreach ($adsFields as $adsField) {
                    $adsFieldsAll = AdsFields::find()
                        ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                        ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                        ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                        ->with('ads_fields_type', 'ads_fields_default_value')
                        ->all();
                    $html .= $this->renderPartial('update/add_fields', ['adsFields' => $adsFieldsAll, 'adsFieldValue' => $model['ads_fields_value']]);
                }
            }


            $city = GeobaseCity::find()
                ->select([
                    '`geobase_city`.`name` as value',
                    '`geobase_city`.`name` as  label',
                    '`geobase_city`.`id` as id',
                    '`geobase_region`.`name` as region_name',
                    '`geobase_region`.`id` as region_id'
                ])
                ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
                ->orderBy('`geobase_region`.`name`')
                ->addOrderBy('`geobase_city`.`name`')
                ->asArray()
                ->all();

            $i = 0;
            $data = [];
            foreach ($city as $item) {
                $data[$item['region_name']][$item['id']] = $item['value'];
            }


            return $this->render('update/update', [
                'model' => $model,
                'category' => array_reverse($category),
                'adsFields' => $html,
                'arraregCity' => $data,
            ]);
        }


        //Debug::prn($model);
    }

    public function actionGeneral_modal(){
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('ads_add/modal',['category' => $category]);
    }

    public function actionShow_category(){
        $id = $_POST['id'];
        $parent_category = AdsCategory::getParentCategory($id);

        if(!empty($parent_category)){
            $category = AdsCategory::getMainCategory();
            $catName = AdsCategory::getCategoryInfo($id,'name');
            echo $this->renderPartial('ads_add/sel_cat',
                [
                    'category' => $category,
                    'parent_category' => $parent_category,
                    'title' => $catName,
                ]
            );
        }
        else{
            return false;
        }

    }

    public function actionShow_parent_category(){
        $id = $_POST['id'];
        $category = AdsCategory::getParentCategory($id);
        $catName = AdsCategory::getCategoryInfo($id,'name');
        if(!empty($category)){
            echo $this->renderPartial('ads_add/shw_category',
                [
                    'category' => $category,
                    'title' => $catName,
                ]);
        }
        else{
            return false;
        }
    }

    public function actionShow_category_end(){
        $categoryList = AdsCategory::getListCategory($_POST['id'],[]);
        echo $this->renderPartial('ads_add/categoryList',
            [
                'category' => array_reverse($categoryList),
            ]
        );
        /*Debug::prn($categoryList);*/
    }

    public function actionSelect_cyti(){
        $city = GeobaseCity::find()->where(['region_id' => $_POST['id']])->all();
        $city = ArrayHelper::map($city, 'id', 'name');
        $city = json_encode($city, JSON_UNESCAPED_UNICODE);
        echo $city;
    }

    public function actionShow_additional_fields(){
        //$id = 4;

        $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $_POST['id']])->one()->group_ads_fields_id;

        $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();

        $html = '';
        //if()
        foreach ($adsFields as $adsField) {
            $adsFieldsAll = AdsFields::find()
                ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                ->with('ads_fields_type', 'ads_fields_default_value')
                ->all();
                $html .= $this->renderPartial('ads_add/add_fields', ['adsFields' => $adsFieldsAll]);
        }

        echo $html;

    }

    public function actionUpload_file()
    {
        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb')) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb') ;
        }



        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $dirThumb = $dir . 'thumb/';
        $i = 0;
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {

            foreach ($_FILES['file']['name'] as $file) {
                Image::watermark($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] .'/frontend/web/img/logo.png')
                    ->save($dir . $_FILES['file']['name'][$i], ['quality' => 100]);

                Image::thumbnail($_FILES['file']['tmp_name'][$i], 142, 100, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dirThumb . $file, ['quality' => 100]);

                $img = new AdsImg();
                $img->ads_id = 1;
                $img->img = $dir . $file;
                $img->img_thumb = $dirThumb. $file;
                $img->user_id = Yii::$app->user->id;
                $img->save();
                $i++;
            }
        }

        echo 1;
    }

    public function actionDelete_file()
    {
        AdsImg::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }

    public function actionView(){
        $model = Ads::find()
            ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['`ads`.`slug`' => $_GET['slug']])
            ->with('ads_fields_value','user','ads_img','geobase_city')
            ->one();
        if(empty($model)){
            throw new HttpException(404 ,'User not found');
        }

        if($model->status != 1 ){
            Ads::updateAllCounters(['views' => 1], ['id' => $model->id] );
            $adsFavorites = Favorites::find()
                ->where(['user_id' => Yii::$app->user->id, 'gist_id' => $model->id, 'gist' => 'ad'])->one();
            return $this->render('view/index', ['model' => $model, 'adsFavorites' => $adsFavorites]);
        }else{
            return $this->render('view/error', ['model' => $model]);
        }


    }

    public function actionUser_ads($login){
        $this->layout = 'page-of-search';
        $userId = UserFunction::getUserIdByLogin($login);
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [2,4]])
            ->andWhere(['`ads`.`user_id`' => $userId])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $query
            ->orderBy('dt_update DESC');
        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')
            ->all();

        return $this->render('view/ads-user', ['ads' => $ads, 'pagination' => $pagination, 'user_id' => $userId]);
    }


    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}