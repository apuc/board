<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.09.2016
 * Time: 22:33
 */

namespace frontend\modules\favorites\models;


use common\models\db\AdsImg;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use frontend\modules\adsmanager\models\Ads;

class Favorites extends \common\models\db\Favorites
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads()
    {
        return $this->hasOne(Ads::className(), ['id' => 'gist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_img()
    {
        return $this->hasMany(AdsImg::className(), ['ads_id' => 'gist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_region()
    {
        return $this->hasMany(GeobaseRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_city()
    {
        return $this->hasOne(GeobaseCity::className(), ['id' => 'city_id']);
    }
}