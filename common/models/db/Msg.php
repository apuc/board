<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "msg".
 *
 * @property integer $id
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $status
 * @property integer $read
 * @property string $message
 * @property integer $to
 * @property integer $from
 * @property integer $is_del_to
 * @property integer $is_del_from
 */
class Msg extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to', 'from'], 'required'],
            [['dt_add', 'dt_update', 'status', 'read', 'to', 'from', 'is_del_to', 'is_del_from'], 'integer'],
            [['message'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
            'read' => 'Read',
            'message' => 'Message',
            'to' => 'To',
            'from' => 'From',
            'is_del_to' => 'Is Del To',
            'is_del_from' => 'Is Del From',
        ];
    }

    public function send($data = [])
    {
        $this->status = isset($data['status']) ? $data['status'] : 0;
        return $this->save();
    }

    public static function sendM($to, $from, $msg, $data = [])
    {
        $newMsg = new Msg();
        $newMsg->to = $to;
        $newMsg->from = $from;
        $newMsg->message = $msg;
        return $newMsg->send($data);
    }

    public function getInterlocutors($userId)
    {
        $interlocutor = Msg::find()
            ->select(['to', 'from'])
            ->where(['to' => $userId])
            ->orWhere(['from' => $userId])
            ->all();
        $arr = [];
        foreach ((array)$interlocutor as $item) {
            $arr[] = $item->to;
            $arr[] = $item->from;
        }
        $arr = array_unique($arr);
        $arr = array_diff($arr, [$userId]);
        return $arr;
    }

    public function getCountUnreadFromInterlocutor($interlocutor)
    {
        return Msg::find()->where(['from' => $interlocutor, 'read' => 0])->count();
    }

    public static function getCountUnreadFromInterlocutorS($interlocutor){
        return Msg::find()->where(['from' => $interlocutor, 'read' => 0])->count();
    }

    public function getDialog($me, $interlocutor)
    {
        $meLogin = User::getUserInfo($me);
        $interlocutorLogin = User::getUserInfo($interlocutor);
        $messages = Msg::find()
            ->where(['to' => $me, 'from' => $interlocutor])
            ->orWhere(['from' => $me, 'to' => $interlocutor])
            ->all();

        $arr = [];
        foreach ($messages as $message) {
            if ($message->from === $me) {
                $arr[$message->id]['type'] = 'my_msg';
                $arr[$message->id]['id'] = $message->id;
                $arr[$message->id]['authorLogin'] = $meLogin->username;
                $arr[$message->id]['authorId'] = $me;
                $arr[$message->id]['authorName'] = $meLogin->profile->name;
                $arr[$message->id]['avatar'] = $meLogin->profile->avatar;
                $arr[$message->id]['avatar_little'] = $meLogin->profile->avatar_little;
                $arr[$message->id]['dt_add'] = $message->dt_add;
                $arr[$message->id]['dt_update'] = $message->dt_update;
                $arr[$message->id]['message'] = $message->message;
            } else {
                $arr[$message->id]['type'] = 'interlocutor_msg';
                $arr[$message->id]['id'] = $message->id;
                $arr[$message->id]['authorLogin'] = $interlocutorLogin->username;
                $arr[$message->id]['authorId'] = $interlocutor;
                $arr[$message->id]['authorName'] = $interlocutorLogin->profile->name;
                $arr[$message->id]['avatar'] = $interlocutorLogin->profile->avatar;
                $arr[$message->id]['avatar_little'] = $interlocutorLogin->profile->avatar_little;
                $arr[$message->id]['dt_add'] = $message->dt_add;
                $arr[$message->id]['dt_update'] = $message->dt_update;
                $arr[$message->id]['message'] = $message->message;
            }
        }
        return $arr;
    }

    public function setUnread($from, $to)
    {
        Msg::updateAll(['read' => 1], ['from' => $from, 'to' => $to, 'read' => 0]);
    }
}
