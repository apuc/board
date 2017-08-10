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
                'pageSizeParam' => false,
                'pageSizeLimit' => [0, 1],
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

    public function searchFilterGet($params){
        //Debug::prn($params);
        $idCat = [];

        if(!empty($params['idCat'])){
            $idCat = $params['idCat'];
            array_unshift($idCat, $params['mainCat']);
            foreach($idCat as $key=>$value){
                if(empty($value)){
                    unset($idCat[$key]);
                }
            }
        }

        //Debug::prn($idCat);
        // id дополнительных полей

        $idAdsFields = [];
        if(!empty($params['AdsFieldFilter'])){
            foreach($params['AdsFieldFilter'] as $key=>$value){
                if(!empty($value)){
                    $idAdsFields[] = $value;
                }

            }
        }



        //Получить id категорий входящих в последнюю выбранную в фильтре
        $parentList = [];
        if(!empty($idCat[count($idCat)-1])){
            $parentList = AdsCategory::getParentAllCategory($idCat[count($idCat)-1]);
        }

//Debug::prn($parentList);


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
                'pageSizeParam' => false,
                'pageSizeLimit' => [0, 1],
            ],
        ]);


        $query->where(['`ads`.`status`' => [2, 4],])
            ->andFilterWhere(['`ads`.`category_id`' => $parentList])
            ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields]);


        if(!empty($params['private']) && empty($params['business'])){
            $query->andFilterWhere(['private_business' => 0]);
        }

        if(!empty($params['business']) && empty($params['private'])){
            $query->andFilterWhere(['private_business' => 1]);
        }


        if(!empty($params['regionFilter'])){
            $query->andFilterWhere(['`ads`.`region_id`' => $params['regionFilter']]);
        }
        if(!empty($params['cityFilter'])){
            $query->andFilterWhere(['`ads`.`city_id`' => $params['cityFilter']]);
        }

        if(!empty($params['textFilter'])){
            $query->andFilterWhere(['LIKE', '`ads`.`title`', $params['textFilter']]);
            $query->orFilterWhere(['LIKE', '`ads`.`content`', $params['textFilter']]);
        }

        if(isset($params['minPrice']) && isset($params['maxPrice'])) {
            $query->andWhere(['between', '`ads`.`price`', (int)$params['minPrice'], (int)$params['maxPrice']]);
        }



        $query->orderBy('dt_update DESC');
        $query->groupBy('`ads`.`id`');

        return $dataProvider;

    }

}
