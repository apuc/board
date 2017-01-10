<?php
namespace frontend\controllers;

use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\AdsImg;
use common\models\db\CategoryGroupAdsFields;
use common\models\db\GeobaseCity;
use frontend\modules\adsmanager\models\FilterAds;
use frontend\modules\msg\actions\MessageApiAction;
use frontend\modules\msg\models\Messages;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\imagine\Image;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'private-messages' => [
                'class' => MessageApiAction::className()
            ],
        ];
    }



    public function actionGeneral_modal(){
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('modal',['category' => $category]);
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

    public function actionShow_parent_modal_category(){
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

    public function actionShow_parent_category(){
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        return
            Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
            Html::dropDownList('idCat[]',
                null,
                ArrayHelper::map($parentCategory, 'id', 'name'),
                ['class' => 'large-select filterCategory','id' => 'parent-category-filter','prompt' => 'Выберите']
            );
    }

    public function actionShow_fields_filter()
    {
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        if(!empty($parentCategory)){
            $html =
                Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
                Html::dropDownList('idCat[]',
                    null,
                    ArrayHelper::map($parentCategory, 'id', 'name'),
                    ['class' => 'large-select filterCategory','id' => 'parent-parent-category-filter','prompt' => 'Выберите']
                );

            $class = '.parentParentCategoryFieldsFilter';

            $result = json_encode(['html' => $html, 'class' => $class]);
            return  $result;

        }else{
            $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $_POST['id']])->one()->group_ads_fields_id;

            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();

            //Debug::prn($adsFields);
            $html = '';
            //if()
            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                    ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                    ->with('ads_fields_type', 'ads_fields_default_value')
                    ->all();
                $html .= $this->renderPartial('filter_fields', ['adsFields' => $adsFieldsAll]);
            }

            $class = '.aditionlFieldsFilter';
            $result = json_encode(['html' => $html, 'class' => $class]);
            return $result;
        }
    }

    public function actionFilter_search_count(){
        $model = new FilterAds();
        $count = $model->searchFilter($_POST)->count();
        return $count;
        //Debug::prn($count);
    }


    public function actionSend_msg()
    {
        $msg = new Messages();
        $req = Yii::$app->request;
        $msg->message = $req->post('msg');
        $msg->whom_id = $req->post('to');
        $msg->from_id = $req->post('from');
        $msg->save();
        return $this->renderPartial('send_msg', ['req'=>$req]);
    }

    public function actionShow_city_filter(){
        $request = Yii::$app->request;
        $city = GeobaseCity::find()->where(['region_id' => $request->post('id')])->orderBy('name')->all();
        echo Html::label(Html::tag('span','Город',['class' => 'large-label-title']),'city-filter', ['class' => 'large-label']) .
            Html::dropDownList('cityFilter',
                null,
                ArrayHelper::map($city, 'id', 'name'),
                ['class' => 'large-select filterRegCity','id' => 'city-filter','prompt' => 'Выберите город']
            );
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
                Image::watermark($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] .'/frontend/web/img/logo_watermark.png')
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

    public function actionShow_city_list(){
        $city = GeobaseCity::find()->where(['region_id' => Yii::$app->request->post('id')])->orderBy('name ASC')->all();
        return $this->renderPartial('city-list-search', ['model' => $city]);
    }

    public function actionShow_phone(){
        $request = Yii::$app->request->post();
        Debug::prn(123);
    }

    public function actionGet_city_widget(){

    }

}
