<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 15:01
 */

namespace frontend\modules\personal_area\widgets;;


use frontend\models\user\UserDec;
use frontend\modules\personal_area\widgets\PrivMsgW;
use vision\messages\widgets\PrivateMessageKushalpandyaWidget;

class Msg2 extends PrivMsgW
{

    public $users;

    protected function getListUsers() {
        //$users = \Yii::$app->mymessages->getAllUsers();
        $user = UserDec::find()->where(['id'=>$this->users])->one();
        $users[] = [
            'id' => $user->id,
            'username' => $user->username,
        ];
        $html = '<ul class="list_users message-user-list">';
        foreach($users as $usr) {
            $html .= '<li class="contact" data-user="' . $usr['id'] . '"><a href="#">';
            //$html .= '<span class="user-img"></span>';
            $html .= '<span class="user-title">' . $usr[\Yii::$app->mymessages->attributeNameUser];
            $html .= ' <span id="cnt">';
            if($usr['cnt_mess']){
                $html .=  $usr['cnt_mess'];
            }
            $html .= "</span></span></a></li>";
        }
        $html .= '</ul>';
        return $html;
    }

}