<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 05.05.2016
 * Time: 9:52
 */

namespace frontend\models\user;


use common\classes\Debug;
use common\models\User;
use dektrium\user\models\Token;
use Yii;

class RecoveryForm extends \dektrium\user\models\RecoveryForm
{

    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'exist', 'targetClass' => User::className(), 'targetAttribute' => ['email' => 'email'], 'message' => 'Пользователя с таким Email не существует.'],
        ];
    }

    /**
     * @return bool|int
     * @throws \yii\base\InvalidConfigException
     */
    public function sendRecoveryMessage()
    {
        $request = Yii::$app->request->post('recovery-form');
        $user = UserDec::find()->where(['email' => $request['email']])->one();
        if(!$user){
            return 2;
        }
        if ($this->validate()) {
            /** @var Token $token */
            $token = Yii::createObject([
                'class'   => Token::className(),
                'user_id' => $user->id,
                'type'    => Token::TYPE_RECOVERY,
            ]);

            if (!$token->save(false)) {
                return false;
            }

            if (!$this->mailer->sendRecoveryMessage($user, $token)) {
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * @param Token $token
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function resetPassword(Token $token)
    {
        if (!$this->validate() || $token->user === null) {
            return false;
        }

        if ($token->user->resetPassword($this->password)) {
            $token->delete();
        }

        return true;
    }
}