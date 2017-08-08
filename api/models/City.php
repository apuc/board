<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.08.2017
 * Time: 15:01
 */

namespace api\models;

use common\models\db\GeobaseCity;
use yii\data\ActiveDataProvider;

class City extends GeobaseCity
{
    public function getListCity($params)
    {
        //Debug::prn($params);
        $query = GeobaseCity::find();
        //$this->load($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);
        if(isset($params['region'])){
            $query->filterWhere(['region_id' => $params['region']]);
        }

        $query->orderBy('name ASC');



        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }
}