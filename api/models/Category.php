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

class Category extends \backend\modules\category\models\Category
{
    public function fields()
    {
        $fields = parent::fields();

        // удаляем не безопасные поля
        unset($fields['description'], $fields['title'], $fields['show_menu'], $fields['images']);

        return $fields;
    }
    public function getListCat($params)
    {
        //Debug::prn($params);
        $query = \backend\modules\category\models\Category::find();
        //$this->load($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);

        if(isset($params['parent'])){
            $query->filterWhere(['parent_id' => $params['parent']]);
        }


        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }
}