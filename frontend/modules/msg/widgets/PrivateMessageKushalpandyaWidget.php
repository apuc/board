<?php
/**
 * Created by PhpStorm.
 * User: VisioN
 * Date: 04.06.2015
 * Time: 12:57
 */

namespace frontend\modules\msg\widgets;



use common\classes\UserFunction;
use frontend\models\user\UserDec;
use frontend\modules\msg\assets\MessageKushalpandyaAssets;

class PrivateMessageKushalpandyaWidget extends PrivateMessageWidget {

    public $users;
    public $user;

    public function run(){
        $this->assetJS();
        $this->addJs();
        $this->html = '<div id="' . $this->uniq_id . '" class="main-message-container">';
        $this->html .= '<div class="message-north">';
        $this->html .= $this->getListUsers();
        $this->html .= $this->getBoxMessages();
        $this->html .= '</div>';
        $this->html .= $this->getFormInput();
        $this->html .= '</div>';
        return $this->html;
    }


    protected function getListUsers() {
        //$users = \Yii::$app->mymessages->getAllUsers();
        $user = UserDec::find()->where(['id'=>$this->users])->all();
        $users = [];
        foreach($user as $item){
            $users[] = [
                'id' => $item->id,
                'username' => $item->username,
            ];
        }
        $html = '<ul class="list_users message-user-list">';
        foreach($users as $usr) {
            $html .= '<li class="contact" data-user="' . $usr['id'] . '"><a href="#">';
            $html .= '<span class="user-img"><img src="'.UserFunction::getUser_avatar_url($usr['id']).'"></span>';
            $html .= '<span class="user-title">' . UserFunction::getUserName($usr['id']);
            $html .= ' <span id="cnt">';
            if($usr['cnt_mess']){
                $html .=  $usr['cnt_mess'];
            }
            $html .= "</span></span></a></li>";
        }
        $html .= '</ul>';
        return $html;
    }


    protected function getBoxMessages() {
        $html = '';
        $html .= '<div class="message-container message-thread conversation"><div class="conversation__box">Выберите собеседника';
        $html .= '</div></div>';
        return $html;
    }


    protected function getFormInput() {
        $html = '<div class="message-south"><form action="#" class="message-form" method="POST">';
        $html .= '<textarea disabled="true" class="msg_textarea" name="input_message"></textarea>';
        $html .= '<input type="hidden" name="message_id_user" value="">';
        $html .= '<button class="msg_btn" type="submit">' . $this->buttonName . '</button>';
        $html .= \Yii::$app->mymessages->enableEmail ? '<span class="send_mail"><input id="send_mail" type="checkbox" name="send_mail" value="1"><label for="send_mail">Отправить также на email</label></span>' : '';
        $html .= '</form></div>';
        return $html;
    }


    protected function assetJS() {
        MessageKushalpandyaAssets::register($this->view);
    }

} 