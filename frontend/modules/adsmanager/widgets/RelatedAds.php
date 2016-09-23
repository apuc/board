<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 22.09.2016
 * Time: 3:07
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\AdsCategory;
use common\classes\Debug;
use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;

class RelatedAds extends Widget
{
    public $idCat;
    public $ads;

    public function run(){
        $count = \common\classes\Ads::getCountAdsCat($this->idCat, $this->ads->id);
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->where(['!=', '`ads`.`id`', $this->ads->id])
            ->andWhere(['status' => [2,4]]);


        if($count < 10){

            $parentId = \common\classes\Ads::getCatIdParent($this->ads->category_id);

            $query
                ->andWhere(['category_id' => AdsCategory::getParentAllCategory($parentId)]);

        }else{
                $query->andWhere(['category_id' => $this->idCat]);

        }
        $query
            ->with('ads_img')

            ->orderBy('RAND()')
            ->limit(5);
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('related-ads', ['ads' => $query->all()]);


    }
}