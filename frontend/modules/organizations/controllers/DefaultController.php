<?php

namespace frontend\modules\organizations\controllers;

use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\Organizations;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `organizations` module
 */
class DefaultController extends Controller
{

    public $layout = 'organizations';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){
        $model = new Organizations();
        if ($model->load(Yii::$app->request->post())) {
            $model->category_id = 1;
            $model->save();
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
        ]);
    }
}
