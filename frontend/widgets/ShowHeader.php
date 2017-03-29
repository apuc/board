<?php

namespace frontend\widgets;
use common\models\db\Ads;
use common\models\db\Msg;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $countAds = Ads::find()->count();
        $countMsg = Msg::getAllUnread(\Yii::$app->user->id);
        return $this-> render('header', [
            'countAds' => $countAds,
            'countMsg' => $countMsg
        ]);
    }
}