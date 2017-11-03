<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 19.10.17
 * Time: 14:23
 */

namespace backend\modules\parser\models;

use common\classes\Debug;
use dektrium\user\helpers\Password;
use dektrium\user\models\User;
use Yii;

class ParserFunction
{
    public static function getUser($email)
    {
        $email = str_replace('+','', $email);
        $user = User::find()->where(['email' => $email])->one();
        /*Debug::prn($user);*/
        if (!empty($user)) {
            $userId = $user->id;
        }
        else{
            $user = new User();
            $user->username = $email ;
            $user->email = $email;
            $password = Password::generate(6);
            $user->password_hash = Yii::$app->security->generatePasswordHash($password);
            $user->confirmed_at = time();
            $user->save();

            $userId = $user->id;
        }

        return $userId;
    }

    public static function getPrice($price)
    {
        $priceArr = explode(' ', $price);
        $priceName = array_pop($priceArr);

        $priceEnd = implode("", $priceArr);
        //Debug::prn($priceEnd);

        if($priceName == 'грн.') {
            return round($priceEnd * 2.2);
        }

        return false;
    }
}