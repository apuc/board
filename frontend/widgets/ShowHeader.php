<?php

namespace frontend\widgets;
use common\models\db\Ads;
use common\models\db\Msg;
use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $countAds = Ads::find()->count();
        $countMsg = Msg::getAllUnread(\Yii::$app->user->id);
        $countOrg = OrgInfo::find()->count();
        return $this-> render('header', [
            'countAds' => $countAds,
            'countMsg' => $countMsg,
            'countOrg' => $countOrg,
        ]);
    }
}