<?php

namespace frontend\widgets;
use common\models\db\Ads;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $countAds = Ads::find()->count();
        return $this-> render('header', ['count' => $countAds]);
    }
}