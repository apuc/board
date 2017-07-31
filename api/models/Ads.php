<?php

namespace api\models;

use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AdsImg;
use common\models\db\Category;
use yii\data\ActiveDataProvider;

class Ads extends \frontend\modules\adsmanager\models\Ads
{
    public function fields()
    {
        $fields = parent::fields();

        // удаляем не безопасные поля
        unset($fields['status'], $fields['top'], $fields['cover'], $fields['mail'], $fields['dt_send_msg']);

        return $fields;
    }

    public function extraFields()
    {
        return ['adsImgs', 'adsFieldsValues', 'city', 'region'];
    }

    public function getListAds($params)
    {

        $query = \frontend\modules\adsmanager\models\Ads::find();
        $query->joinWith('adsImgs');
        $query->joinWith('adsFieldsValues');
        $query->joinWith('categoryAds');
        $query->joinWith('city');
        $query->joinWith('region');
        /*$this->load($params);*/
        /*Debug::prn($params);*/
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => (!isset($params['limit']) ? 10 : $params['limit']),
            ],
        ]);


        $query->where(['`ads`.`status`' => [2, 4]]);
        //$query->filterWhere();

        if(isset($params['catId'])){
            $catId = [];

            $catId = AdsCategory::getParentAllCategory($params['catId']);
            $query->filterWhere(['category_id' => $catId]);
        }

        $query->orderBy('dt_update DESC');
        $query->groupBy('`ads`.`id`');

        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }



}
