<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.05.2017
 * Time: 14:52
 */

namespace api\models;

use common\classes\Debug;
use common\models\db\AdsImg;
use common\models\db\Category;
use yii\data\ActiveDataProvider;

class Ads extends \frontend\modules\adsmanager\models\Ads
{
    public function fields()
    {
        return ['id'];
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
        //$this->load($params);
//Debug::prn($this);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $params['limit'],
            ],
        ]);


        $query->where(['`ads`.`status`' => [2, 4]]);
        //$query->filterWhere();

        $query->orderBy('dt_update ASC');
        $query->groupBy('`ads`.`id`');

        //Debug::prn($this->hasMany(AdsImg::className(), ['ads_id' => 'id']));
//Debug::prn($query->createCommand()->rawSql);
        return $dataProvider;
    }



}
