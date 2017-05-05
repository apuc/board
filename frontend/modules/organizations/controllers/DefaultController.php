<?php

namespace frontend\modules\organizations\controllers;

use backend\modules\organization\Organization;
use common\classes\Debug;
use common\classes\FileLoader;
use common\classes\OrganizationInfo;
use common\models\db\AddressPhone;
use common\models\db\CategoryOrganizations;
use common\models\db\GeobaseCity;
use common\models\db\OrganizationsAddress;
use common\models\db\OrgInfo;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\organizations\models\Organizations;
use frontend\modules\organizations\models\OrganizationSearch;
use frontend\widgets\ShowTree;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use frontend\modules\favorites\models\Favorites;

/**
 * Default controller for the `organizations` module
 */
class DefaultController extends Controller
{

    public $layout = 'organizations';

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
                        'actions' => ['view', 'all', 'index', 'about'],
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        $category = OrganizationInfo::getAllCategory();
        return $this->render('index',['category' => $category]);
    }

    public function actionAdd(){
        $this->layout = "main";
        $model = new Organizations();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->save();
            if(isset($_POST['orgPhone'][0])){
                AddressPhone::savePhone($_POST['orgPhone'][0],$model->id);
            }
            if(isset($_POST['city'])){
                foreach ($_POST['city'] as $k=>$a){
                    $address_id = OrganizationsAddress::saveAddress($model->id,$a,$_POST['address'][$k]);
                    AddressPhone::savePhone($_POST['orgPhone'][$k],$model->id,$address_id);
                }
            }
            $path = 'media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/';
            if (!file_exists('media/users/' . Yii::$app->user->id)) {
                mkdir('media/users/' . Yii::$app->user->id . '/');
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/org')) {
                mkdir('media/users/' . Yii::$app->user->id . '/org' );
            }
            if (!file_exists('media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/')) {
                mkdir('media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/' );
            }
            $f = FileLoader::load($model,$path,['logo'=>'logo','header'=>'header']);

            $model->logo = (isset($f['logo'])) ? $f['logo'] : '';
            $model->header = (isset($f['header'])) ? $f['header'] : '';
            $model->update();

            Yii::$app->session->setFlash('success','Организация успешно добавлена.');
            return $this->redirect('/personal_area/org/org_user_moder');
        }
        $geoInfo = \common\classes\Address::get_geo_info();
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

        $data = [];
        foreach ($city as $item) {
            $data[$item['region_name']][$item['id']] = $item['value'];
        }
        return $this->render('add', [
            'model' => $model,
            'geoInfo' => $geoInfo,
            'arraregCity' => $data,
            'category_org' => CategoryOrganizations::findAll(['parent_id'=>0]),
        ]);
    }

    public function actionUpdate($id){
        $this->layout = "main";
        $model = Organizations::find()->where(['id' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->update();
            AddressPhone::deleteAll(['organizations_id' => $model->id]);
            OrganizationsAddress::deleteAll(['organizations_id' => $model->id]);
            if(isset($_POST['orgPhone'][0])){
                AddressPhone::savePhone($_POST['orgPhone'][0],$model->id);
            }
            if(isset($_POST['city'])){
                foreach ($_POST['city'] as $k=>$a){
                    $address_id = OrganizationsAddress::saveAddress($model->id,$a,$_POST['address'][$k]);
                    AddressPhone::savePhone($_POST['orgPhone'][$k],$model->id,$address_id);
                }
            }


                $path = 'media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/';
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/org')) {
                    mkdir('media/users/' . Yii::$app->user->id . '/org');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/')) {
                    mkdir('media/users/' . Yii::$app->user->id . '/org/' . $model->id . '/');
                }
                $f = FileLoader::load($model, $path, ['logo' => 'logo', 'header' => 'header']);

                $model->logo = (isset($f['logo'])) ? $f['logo'] : $_POST['org-logo'];
                $model->header = (isset($f['header'])) ? $f['header'] : $_POST['org-header'];
                $model->update();

            Yii::$app->session->setFlash('success','Организация успешно добавлена.');
            return $this->redirect('/personal_area/org/org_user_moder');
        }
        else{
            $geoInfo = \common\classes\Address::get_geo_info();
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

            $data = [];
            foreach ($city as $item) {
                $data[$item['region_name']][$item['id']] = $item['value'];
            }
            $categoryList = OrganizationInfo::getListCategory($model->category_id,[]);

            $phoneHomeBlock = AddressPhone::find()->where(['organizations_id' => $id, 'address_id' => 0])->all();

            $infoAdressPhone = OrganizationsAddress::find()
                ->leftJoin('address_phone', '`address_phone`.`address_id` = `organizations_address`.`id`')
                ->where(['`organizations_address`.`organizations_id`' => $id])
                ->with('address_phone')
                ->all();

            return $this->render('update',
                [
                    'model' => $model,
                    'geoInfo' => $geoInfo,
                    'arraregCity' => $data,
                    'category_org' => CategoryOrganizations::findAll(['parent_id'=>0]),
                    'categoryList' => array_reverse($categoryList),
                    'phoneHomeBlock' => $phoneHomeBlock,
                    'infoAdressPhone' => $infoAdressPhone,
                ]
            );
        }


    }

    public function actionAll(){
        $catOrg = new CategoryOrganizations();
        $searchModel = new OrganizationSearch();
        $dataProvider = $searchModel->getListOrg();

        return $this->render('all', [
            'catOrg' => $catOrg,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        /*return $this->render('all', [
            'catOrg' => $catOrg,
            'org' => $org
        ]);*/
    }

    public function actionView($slug){
        $model = OrgInfo::get($slug);
        Organizations::updateAllCounters(['views' => 1], ['id' => $model->id] );
        //Debug::prn($model);
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [2,4]])
            ->andWhere(['`ads`.`business_id`' => $model->id])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $sort = 'dt_update DESC';
        if(Yii::$app->request->get('sort')){
            if(Yii::$app->request->get('sort') == 'cheap'){
                $sort = 'price ASC';
            }
            if(Yii::$app->request->get('sort') == 'dear'){
                $sort = 'price DESC';
            }
        }
        $query->orderBy($sort);
        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')
            ->all();
        $orgFavorites = Favorites::find()
            ->where(['user_id' => Yii::$app->user->id, 'gist_id' => $model->id, 'gist' => 'org'])->one();
        return $this->render('view',
            [
                'model' => $model,
                'ads' => $ads,
                'pagination' => $pagination,
                'orgFavorites' => $orgFavorites,
            ]
        );

    }

    public function actionAbout($slug){
        $model = OrgInfo::get($slug);
        $phone = AddressPhone::find()->where(['organizations_id' => $model->id, 'address_id' => 0])->all();
        $countFil = OrganizationsAddress::find()->where(['organizations_id' => $model->id])->count();

        $orgFavorites = Favorites::find()
            ->where(['user_id' => Yii::$app->user->id, 'gist_id' => $model->id, 'gist' => 'org'])->one();
        /*Debug::prn($phone);
        Debug::prn($countFil);*/
        return $this->render('about-org',
            [
                'model' => $model,
                'phone' => $phone,
                'count' => $countFil,
                'orgFavorites' => $orgFavorites,
            ]
        );

    }
}
