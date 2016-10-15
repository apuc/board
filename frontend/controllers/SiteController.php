<?php
namespace frontend\controllers;

use common\classes\AdsCategory;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;
use frontend\modules\adsmanager\models\FilterAds;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
        ];
    }



    public function actionGeneral_modal(){
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('modal',['category' => $category]);
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

}
