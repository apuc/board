<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 15:01
 */

namespace frontend\modules\personal_area\widgets;;


use common\classes\Debug;
use frontend\assets\MsgKA;
use frontend\models\user\UserDec;
use frontend\modules\personal_area\widgets\PrivMsgW;
use vision\messages\widgets\PrivateMessageKushalpandyaWidget;

class Msg2 extends PrivateMessageKushalpandyaWidget
{

    public $users;
    public $user;

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

    protected function addJs() {
        $view = $this->getView();
        $var_name = 'mess_' . $this->uniq_id;
        $base = "var baseUrlPrivateMessage ='" . \Yii::$app->mymessages->nameController . "';";
        $view->registerJs($base, $view::POS_BEGIN);
        $script = 'var ' . $var_name . ' = new visiPrivateMessages("#'. $this->uniq_id .'");';
        $script .= "$var_name.getAllMessages();";
        $script .= "$var_name.cau($this->user);";
        $view->registerJs($script, $view::POS_READY);
    }

    protected function assetJS() {
        MsgKA::register($this->view);
    }

}