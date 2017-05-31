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
        return ['id', 'user_id', 'category_id','dt_add', 'dt_update','title', 'content', 'slug',
            'views','top','region_id', 'city_id', 'price', 'name','phone','private_business','business_id'];
    }

    public function extraFields()
    {
        return ['adsImgs','adsFieldsValues'];
    }

    public function getListAds($params)
    {

        $query = \frontend\modules\adsmanager\models\Ads::find();
        $query->joinWith('adsImgs');
        $query->joinWith('adsFieldsValues');
        $query->joinWith('categoryAds');
        /*$this->load($params);*/
        /*Debug::prn($params);*/
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $params['limit'],
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
