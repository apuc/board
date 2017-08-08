<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.08.2017
 * Time: 13:56
 */

namespace api\models;

use common\models\db\GeobaseRegion;
use yii\data\ActiveDataProvider;

class Region extends GeobaseRegion
{
    public function getListRegion($params)
    {
        //Debug::prn($params);
        $query = GeobaseRegion::find();
        //$this->load($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);
        $query->where(['!=','id', 19])
            ->andWhere(['!=','id', 21]);

        $query->orderBy('name ASC');



        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }
}