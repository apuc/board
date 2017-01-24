<?php

namespace frontend\modules\organizations\controllers;

use common\classes\Debug;
use common\classes\FileLoader;
use common\models\db\AddressPhone;
use common\models\db\CategoryOrganizations;
use common\models\db\GeobaseCity;
use common\models\db\OrganizationsAddress;
use common\models\db\OrgInfo;
use frontend\modules\organizations\models\Organizations;
use frontend\widgets\ShowTree;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

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
                        'actions' => ['view','all'],
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
        return $this->render('index');
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
            return $this->redirect('/personal_area/ads/ads_user_active');
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

    public function actionAll(){
        $catOrg = new CategoryOrganizations();
        $org = OrgInfo::find()->limit(10)->orderBy('dt_update DESC')->all();
        return $this->render('all', [
            'catOrg' => $catOrg,
            'org' => $org
        ]);
    }
}
