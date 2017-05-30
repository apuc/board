<?php

namespace frontend\controllers;

use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AddressPhone;
use common\models\db\Ads;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\AdsImg;
use common\models\db\CategoryGroupAdsFields;
use common\models\db\CategoryOrganizations;
use common\models\db\GeobaseCity;
use common\models\db\Organizations;
use common\models\db\OrganizationsAddress;
use frontend\modules\adsmanager\models\FilterAds;
use frontend\modules\msg\actions\MessageApiAction;
use frontend\modules\msg\models\Messages;
use frontend\modules\msg\Msg;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
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
                'class' => MessageApiAction::className(),
            ],
        ];
    }

    public function actionGeneral_modal()
    {
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('modal', ['category' => $category]);
    }

    public function actionShow_category()
    {
        $id = $_POST['id'];
        $parent_category = AdsCategory::getParentCategory($id);

        if (!empty($parent_category)) {
            $category = AdsCategory::getMainCategory();
            $catName = AdsCategory::getCategoryInfo($id, 'name');
            echo $this->renderPartial('ads_add/sel_cat',
                [
                    'category' => $category,
                    'parent_category' => $parent_category,
                    'title' => $catName,
                ]
            );
        } else {
            return false;
        }

    }

    public function actionShow_parent_modal_category()
    {
        $id = $_POST['id'];
        $category = AdsCategory::getParentCategory($id);
        $catName = AdsCategory::getCategoryInfo($id, 'name');
        if (!empty($category)) {
            echo $this->renderPartial('ads_add/shw_category',
                [
                    'category' => $category,
                    'title' => $catName,
                ]);
        } else {
            return false;
        }
    }

    public function actionShow_category_end()
    {
        $categoryList = AdsCategory::getListCategory($_POST['id'], []);
        echo $this->renderPartial('ads_add/categoryList',
            [
                'category' => array_reverse($categoryList),
            ]
        );
        /*Debug::prn($categoryList);*/
    }

    public function actionShow_additional_fields()
    {
        //$id = 4;
        //$_POST['id'] = 317;
        $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $_POST['id']])->one();

        $html = '';
        if (!empty($groupFieldsId)) {
            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId->group_ads_fields_id])->all();
            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value',
                        '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                    ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                    ->with('ads_fields_type', 'ads_fields_default_value')
                    ->all();
                $html .= $this->renderPartial('ads_add/add_fields', ['adsFields' => $adsFieldsAll]);
            }
        }
        echo $html;

    }

    public function actionShow_parent_category()
    {
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        return
            Html::label(Html::tag('span', 'Подкатегория', ['class' => 'large-label-title']), 'parent-category-filter',
                ['class' => 'large-label']) .
            Html::dropDownList('idCat[]',
                null,
                ArrayHelper::map($parentCategory, 'id', 'name'),
                ['class' => 'large-select filterCategory', 'id' => 'parent-category-filter', 'prompt' => 'Выберите']
            );
    }

    public function actionShow_fields_filter()
    {
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        if (!empty($parentCategory)) {
            $html =
                Html::label(Html::tag('span', 'Подкатегория', ['class' => 'large-label-title']),
                    'parent-category-filter', ['class' => 'large-label']) .
                Html::dropDownList('idCat[]',
                    null,
                    ArrayHelper::map($parentCategory, 'id', 'name'),
                    [
                        'class' => 'large-select filterCategory',
                        'id' => 'parent-parent-category-filter',
                        'prompt' => 'Выберите',
                    ]
                );

            $class = '.parentParentCategoryFieldsFilter';

            $result = json_encode(['html' => $html, 'class' => $class]);
            return $result;

        } else {
            $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $_POST['id']])->one()->group_ads_fields_id;

            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();

            //Debug::prn($adsFields);
            $html = '';
            //if()
            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value',
                        '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
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

    public function actionFilter_search_count()
    {
        $model = new FilterAds();
        $count = $model->searchFilter($_POST)->count();
        return $count;
        //Debug::prn($count);
    }

    public function actionSend_msg()
    {
        $msg = new \common\models\db\Msg();
        $req = Yii::$app->request;
        $msg->message = $req->post('msg');
        $msg->to = $req->post('to');
        $msg->from = $req->post('from');
        $msg->send();
        return $this->renderPartial('send_msg', ['req' => $req]);
    }

    public function actionShow_city_filter()
    {
        $request = Yii::$app->request;
        $city = GeobaseCity::find()->where(['region_id' => $request->post('id')])->orderBy('name')->all();
        echo Html::label(Html::tag('span', 'Город', ['class' => 'large-label-title']), 'city-filter',
                ['class' => 'large-label']) .
            Html::dropDownList('cityFilter',
                null,
                ArrayHelper::map($city, 'id', 'name'),
                ['class' => 'large-select filterRegCity', 'id' => 'city-filter', 'prompt' => 'Выберите город']
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
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb');
        }

        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $dirThumb = $dir . 'thumb/';
        $i = 0;
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
                $img->ads_id = 1;
                $img->img = Url::home(true) . $dir . $file;
                $img->img_thumb = Url::home(true) . $dirThumb . $file;
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

    public function actionShow_city_list()
    {
        $city = GeobaseCity::find()->where(['region_id' => Yii::$app->request->post('id')])->orderBy('name ASC')->all();
        return $this->renderPartial('city-list-search', ['model' => $city]);
    }

    public function actionShow_phone()
    {
        $request = Yii::$app->request->post();
        $phone = Ads::find()->where(['id' => $request['id']])->one()->phone;
        return $phone;
    }

    public function actionGet_city_widget()
    {
        $model = new Organizations();
        $geoInfo = \common\classes\Address::get_geo_info();
        $city = GeobaseCity::find()
            ->select([
                '`geobase_city`.`name` as value',
                '`geobase_city`.`name` as  label',
                '`geobase_city`.`id` as id',
                '`geobase_region`.`name` as region_name',
                '`geobase_region`.`id` as region_id',
            ])
            ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
            ->orderBy('`geobase_region`.`name`')
            ->addOrderBy('`geobase_city`.`name`')
            ->asArray()
            ->all();

        $data = [];
        foreach ($city as $item) {
            $data[$item['region_name']][$item['id']] = $item['value'];
        }
        return $this->renderAjax('city_widget', [
            'model' => $model,
            'geoInfo' => $geoInfo,
            'arraregCity' => $data,
            'code' => $_POST['code'],
        ]);
    }

    public function actionGet_category_modal()
    {
        $parentCateg = CategoryOrganizations::findAll(['parent_id' => 0]);
        $subCateg = CategoryOrganizations::findAll(['parent_id' => $_POST['id']]);
        return $this->renderPartial('category_org_modal', [
            'parentCateg' => $parentCateg,
            'subCateg' => $subCateg,
        ]);
    }

    public function actionSelect_sub_category()
    {
        $subCateg = CategoryOrganizations::findOne(['id' => $_POST['id']]);
        $parentCateg = CategoryOrganizations::findOne(['id' => $subCateg->parent_id]);
        return $this->renderPartial('select_sub_category', [
            'parentCateg' => $parentCateg,
            'subCateg' => $subCateg,
        ]);
    }

    /*Отправить письмо администратору о заблокированном объявлении*/
    public function actionMsg_product_to_admin()
    {
        $request = Yii::$app->request->post();
        $subject = 'Объявление не опублткованно';
        Yii::$app->mailer->htmlLayout = 'layouts/admin';
        Yii::$app->mailer->compose('ads/ads-public', ['post' => $request])
            ->setTo('noreply@rub-on.ru')
            ->setFrom(['support@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();

        return "<div>Сообщение успешно отправлено. Мы Вас оповестим.</div>";
    }

    public function actionGet_organization()
    {
        $org = Organizations::find()->where(['user_id' => Yii::$app->user->id, 'status' => [2, 4]])->all();
        $html = '<div class="form-line">';
        $html .= Html::label('Выберите организацию', null, ['class' => 'label-name']);
        $html .= Html::dropDownList('Ads[business_id]', null, ArrayHelper::map($org, 'id', 'title'),
            ['class' => 'input-name', 'prompt' => 'Выберите']);
        $html . '</div>';
        return $html;
    }

    public function actionMap()
    {
        return $this->render('map');
    }

    public function actionShow_address_filial(){
        $request = Yii::$app->request->post();
        //$request['id'] = 3;
        $info = OrganizationsAddress::find()
            ->leftJoin('address_phone', '`address_phone`.`address_id` = `organizations_address`.`id`')
            ->where(['`organizations_address`.`organizations_id`' => $request['id']])
            ->with('address_phone')
            ->all();

        //Debug::prn($info);

        return $this->renderPartial('address-filial', ['info' => $info]);
    }

    //Добавление поля телефона в организациях
    public function actionAdd_phone(){
        return $this->renderAjax('add-phone',
            [
                'index' => Yii::$app->request->post('index'),
                'count' => Yii::$app->request->post('count'),
            ]
        );
    }


    //Отправка письма рекламы
    public function actionMsg_reclama()
    {
        $request = Yii::$app->request->post();
        $subject = 'Реклама на сайте';
        Yii::$app->mailer->htmlLayout = 'layouts/admin';
        Yii::$app->mailer->compose('reclama/reclama', ['post' => $request])
            ->setTo('noreply@rub-on.ru')
            ->setFrom(['support@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();

        //return "<div>Сообщение успешно отправлено. Мы Вас оповестим.</div>";
    }
}
