<?php

namespace frontend\widgets;
use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\Ads;
use common\models\db\Msg;
use frontend\models\user\UserDec;
use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $category = AdsCategory::getAllCategory();
        /*$userInfo = UserDec::find()->where(['id' => \Yii::$app->user->id])->one();

        $countAds = Ads::find()->count();
        if(empty($userInfo->id)){
            $countMsg = 0;
        }
        else{
            $countMsg = Msg::getAllUnread($userInfo->id);
        }

        $countOrg = OrgInfo::find()->count();*/
        return $this-> render('header', [
            'category' => $category,
            /*'countAds' => $countAds,
            'countMsg' => $countMsg,
            'countOrg' => $countOrg,
            'userInfo' => $userInfo,*/
        ]);
    }
}