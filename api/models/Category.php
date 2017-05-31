<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 31.05.2017
 * Time: 11:06
 */

namespace api\models;

use common\classes\Debug;
use yii\data\ActiveDataProvider;

class Category extends \common\models\db\Category
{

    public function getListCat($params)
    {

        $query = \common\models\db\Category::find();
        //$this->load($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);

        $query->filterWhere(['parent_id' => $params['parent']]);


        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }
}