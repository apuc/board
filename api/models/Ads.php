<?php

namespace api\models;

use common\classes\AdsCategory;
use common\classes\ApiFunction;
use common\classes\Debug;
use common\models\db\AdsImg;
use common\models\db\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class Ads extends \frontend\modules\adsmanager\models\Ads
{
    public function fields()
    {
        $fields = parent::fields();
        // удаляем не безопасные поля
        unset($fields['top'], $fields['dt_send_msg']);
        return $fields;
    }

    public function extraFields()
    {
        return ['adsImgs', 'adsFieldsValues', 'city', 'region', 'categoryAds', 'days'];
    }

    public function getDays(){
        return intval((time() - $this->dt_update) / 86400);
    }

    public function getListAds($params)
    {
        if(!isset($params['api_key']) || empty($params['api_key'])){
            throw new ServerErrorHttpException('The key api is incorrect or missing');
        }
        $siteInfo = ApiFunction::getApiKey($params['api_key']);
        if(!empty($siteInfo->name)) {
            $query = self::find();
            $query->joinWith('adsImgs');
            $query->joinWith('adsFieldsValues');
            $query->joinWith('categoryAds');
            $query->joinWith('city');
            $query->joinWith('region');
            /*$this->load($params);*/
            // Debug::prn($params);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => (!isset($params['limit']) ? 10 : $params['limit']),
                    'pageSizeParam' => false,
                    'pageSizeLimit' => [0, 1],
                ]
            ]);

            if(!empty($params['user'])){
                $query->andFilterWhere(['mail' => $params['user']]);
                if(!empty($params['status'])){
                    $query->andWhere(['=', '`ads`.`status`', $params['status']]);
                }
                else{
                    $query->andWhere(['=', '`ads`.`status`', 2]);
                }

            }else {
                $query->where(['`ads`.`status`' => [2, 4]]);

                if($siteInfo->visible_ads == 1) {
                    $query->andWhere(['`ads`.`site_id`' => $siteInfo->id]);
                    $query->orWhere(['AND', [
                            '`ads`.`pars`' => 1,
                            '`ads`.`status`' => [2, 4]
                        ]
                    ]);
                }
            }//else
            //Debug::prn($query->createCommand()->rawSql);die();
            //$query->filterWhere();

            if(isset($params['catId'])){
                $catId = [];

                $catId = AdsCategory::getParentAllCategory($params['catId']);
                $query->andFilterWhere(['category_id' => $catId]);
            }


            $query->orderBy('dt_update DESC');
            $query->groupBy('`ads`.`id`');

            //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
            //Debug::prn($query->createCommand()->rawSql);
            return $dataProvider;
        }else{
            //return $siteInfo;
            throw new ServerErrorHttpException($siteInfo);

            //Debug::prn(123);
        }

    }

    public function searchFilterGet($params){
       // Debug::prn($params);
        $idCat = [];

        if(!empty($params['idCat'])){
            $idCat = $params['idCat'];
            array_unshift($idCat, $params['mainCat']);
            foreach($idCat as $key=>$value){
                if(empty($value)){
                    unset($idCat[$key]);
                }
            }
        }else{
            $idCat = AdsCategory::getParentAllCategory($params['mainCat']);
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


    public function getListAdsAll($params)
    {
        $siteInfo = ApiFunction::getApiKey($params['api_key']);
        if(!empty($siteInfo->name)) {
            $query = \frontend\modules\adsmanager\models\Ads::find();
            $query->joinWith('adsImgs');
            $query->joinWith('adsFieldsValues');
            $query->joinWith('categoryAds');
            $query->joinWith('city');
            $query->joinWith('region');

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => (!isset($params['limit']) ? 10 : $params['limit']),
                    'pageSizeParam' => false,
                    'pageSizeLimit' => [0, 1],
                ],
            ]);

            $query->andWhere(['`ads`.`site_id`' => $siteInfo->id]);
            if(isset($params['status'])) {
                $query->andWhere(['`ads`.`status`' => $params['status']]);
            }

            /*if(isset($params['catId'])){
                $catId = [];

                $catId = AdsCategory::getParentAllCategory($params['catId']);
                $query->andFilterWhere(['category_id' => $catId]);
            }*/


            $query->orderBy('dt_update DESC');
            $query->groupBy('`ads`.`id`');

            return $dataProvider;
        }else{
            throw new ServerErrorHttpException($siteInfo);
        }
    }

    public function getSimilar($params)
    {

        $count = \common\classes\Ads::getCountAdsCat($params['category'], $params['ads']);
        //Debug::prn($count);
        $query = \frontend\modules\adsmanager\models\Ads::find();
        $query->joinWith('adsImgs');
        $query->joinWith('adsFieldsValues');
        $query->joinWith('categoryAds');
        $query->joinWith('city');
        $query->joinWith('region');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => (!isset($params['limit']) ? 10 : $params['limit']),
                'pageSizeParam' => false,
                //'pageSizeLimit' => [0, 1],
            ],
        ]);


        $query = $query
            ->where(['!=', '`ads`.`id`', $params['ads'] ])
            ->andWhere(['status' => [2,4]]);


        if($count < 10){

            $parentId = \common\classes\Ads::getCatIdParent($params['category']);

            $query->andWhere(['category_id' => AdsCategory::getParentAllCategory($parentId)]);

        }else{
            $query->andWhere(['category_id' => $params['category']]);
        }
        $query
            //->with('ads_img')

            ->orderBy('RAND()');
            //->limit($params['limit']);
        //Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }
}
