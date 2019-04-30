<?php

namespace frontend\widgets;
use common\classes\Debug;
use common\models\db\Ads;
use common\models\db\Msg;
use common\classes\AdsCategory;
use frontend\models\user\UserDec;
use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $userInfo = UserDec::find()->where(['id' => \Yii::$app->user->id])->one();
        $category = AdsCategory::getAllCategory();

        $countAds = Ads::find()->count();
        if(empty($userInfo->id)){
            $countMsg = 0;
        }
        else{
            $countMsg = Msg::getAllUnread($userInfo->id);
        }

        $countOrg = OrgInfo::find()->count();
        return $this-> render('header', [
            'countAds' => $countAds,
            'countMsg' => $countMsg,
            'countOrg' => $countOrg,
            'userInfo' => $userInfo,
            'category' => $category,
        ]);
    }
}