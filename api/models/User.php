<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 20.03.19
 * Time: 14:33
 */

namespace api\models;


use frontend\models\user\UserDec;
use yii\data\ActiveDataProvider;

class User extends UserDec
{

    public function fields()
    {
        $fields = parent::fields();

        // удаляем не безопасные поля
        unset($fields['password_hash'], $fields['flags'], $fields['registration_ip'], $fields['auth_key']);

        return $fields;
    }

    public function extraFields()
    {
        return ['profile'];
    }

    public function getUser()
    {
        $query = UserDec::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $dataProvider;
    }

    public static function getByAuthKey($token)
    {
        return self::find()->where(['auth_key' => $token])->one() ?: null;
    }

}