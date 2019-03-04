<?php

namespace frontend\widgets;
use common\classes\AdsCategory;
use common\classes\Debug;
use common\classes\GeoFunction;
use common\models\db\Ads;
use common\models\db\GeobaseCity;
use common\models\db\Msg;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RegistrationForm;
use frontend\models\user\RecoveryForm;
use frontend\models\user\UserDec;
use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        $category = AdsCategory::getAllCategory();
        $modelLogin = '';
        $modelRegister = '';
        $modelForgout = '';
        if(\Yii::$app->user->isGuest){
            $modelLogin = \Yii::createObject(LoginForm::className());
            $modelRegister = new RegistrationForm();
            $modelForgout = \Yii::createObject( RecoveryForm::className());
        }

        $city = GeoFunction::getCity();

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
            'modelLogin' => $modelLogin,
            'modelRegistration' => $modelRegister,
            'modelForgout' => $modelForgout,
            'city' => $city,
            //'cityAll' => $cityAll,
            /*'countAds' => $countAds,
            'countMsg' => $countMsg,
            'countOrg' => $countOrg,
            'userInfo' => $userInfo,*/
        ]);
    }
}