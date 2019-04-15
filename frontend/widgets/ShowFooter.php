<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 03.05.2016
 * Time: 14:03
 */

namespace frontend\widgets;


use common\classes\AdsCategory;
use yii\base\Widget;

class ShowFooter extends Widget
{
    public function run(){
        $cats = AdsCategory::getMainCategory();
        return $this->render('footer',['categories'=>$cats]);
    }

}