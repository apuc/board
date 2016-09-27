<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 05.04.2016
 * Time: 13:58
 */

namespace common\classes;



use dektrium\user\models\Profile;
use dektrium\user\models\User;
use Yii;

class UserFunction
{
    //получить роль текущего пользователя
    public static function getRole_user(){
        $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        return $role;
    }

    //Получить ip адрес пользователя
    public static function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    //получить аватар пользователя
    public static function getUser_avatar_url($smal=true, $id = null){
        $img = 'avatar_little';
        if(!$smal){
            $img = 'avatar';
        }

        if(empty($id)){
            $avatar = Profile::find()->where(['user_id' => Yii::$app->user->id])->one()->$img;
        }
        else{
            $avatar = Profile::find()->where(['user_id' => $id])->one()->$img;
        }

        if(empty($avatar)){
            if(!$smal){
                $avatar = '/img/default_avatar_male.jpg';
            }
            else{
                $avatar = '/img/default_avatar_little.jpg';
            }

        }

        return($avatar);
    }

    //получить имя пользователя. вернет login, если имя не указано
    public static function getUserName($id = null){
        if(empty($id)){
            $name = Profile::find()->where(['user_id' => Yii::$app->user->id])->one()->name;
            if(empty($name)){
                $name = User::find()->where(['id' => Yii::$app->user->id])->one()->username;
            }
        }
        else{
            $name = Profile::find()->where(['user_id' => $id])->one()->name;
            if(empty($name)){
                $name = User::find()->where(['id' => $id])->one()->username;
            }
        }

        return $name;

    }
}