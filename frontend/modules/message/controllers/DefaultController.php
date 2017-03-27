<?php

namespace frontend\modules\message\controllers;

use common\classes\Debug;
use common\models\db\Msg;
use common\models\db\User;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `message` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    array(
                        'allow' => true,
                        'roles' => array('@'),
                    ),
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    public function actionIndex()
    {
        $msg = new Msg();
        $interlocutors = User::getUserInfo($msg->getInterlocutors(\Yii::$app->user->id));
        return $this->render('index', [
            'interlocutors' => $interlocutors,
        ]);
    }

    public function actionDialog($username)
    {
        $msg = new Msg();
        $interlocutor = User::findOne(['username' => $username])->id;
        $interlocutors = User::getUserInfo($msg->getInterlocutors(\Yii::$app->user->id));
        $dialog = $msg->getDialog(\Yii::$app->user->id, $interlocutor);
        return $this->render('dialog', [
            'dialog' => $dialog,
            'interlocutors' => $interlocutors,
            'to' => $interlocutor,
        ]);
    }

    public function actionSend_msg()
    {
        if (!empty($_POST['msg'])) {
            $msg = new Msg();
            $msg->to = $_POST['to'];
            $msg->from = $_POST['from'];
            $msg->message = $_POST['msg'];
            $msg->send();
            $dialog = $msg->getDialog(\Yii::$app->user->id, $_POST['to']);
            return $this->renderPartial('messages', [
                'dialog' => $dialog,
            ]);
        }
    }

    public function actionGet_msg()
    {
        $msg = new Msg();
        $has = $msg->getCountUnreadFromInterlocutor($_POST['to']);
        if ($has > 0) {
            $dialog = $msg->getDialog(\Yii::$app->user->id, $_POST['to']);
            $msg->setUnread($_POST['to'],\Yii::$app->user->id);
            return $this->renderPartial('messages', [
                'dialog' => $dialog,
            ]);
        }
        return 0;
    }

    public function actionGet_interlocutor(){
        $msg = new Msg();
        $interlocutors = User::getUserInfo($msg->getInterlocutors(\Yii::$app->user->id));
        return $this->renderPartial('interlocutors', [
            'interlocutors' => $interlocutors
        ]);
    }
}
