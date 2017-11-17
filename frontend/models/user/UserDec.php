<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 06.05.2016
 * Time: 14:05
 */

namespace frontend\models\user;


use dektrium\user\models\Token;
use dektrium\user\models\User;
use Yii;

class UserDec extends User
{
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'score';
        $scenarios['update'][]   = 'score';
        $scenarios['register'][] = 'score';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['scoreLength']   = ['score', 'double'];

        return $rules;
    }

    /**
     * Attempts user confirmation.
     *
     * @param string $code Confirmation code.
     *
     * @return boolean
     */
    public function attemptConfirmation($code)
    {
        $token = $this->finder->findTokenByParams($this->id, $code, Token::TYPE_CONFIRMATION);

        if ($token instanceof Token && !$token->isExpired) {
            $token->delete();
            if (($success = $this->confirm())) {
                Yii::$app->user->login($this, $this->module->rememberFor);
                $message = Yii::t('user', 'Thank you, registration is now complete.');
            } else {
                $message = Yii::t('user', 'Something went wrong and your account has not been confirmed.');
            }
        } else {
            $success = false;
            $message = Yii::t('user', 'The confirmation link is invalid or expired. Please try requesting a new one.');
        }

        //Yii::$app->session->setFlash($success ? 'success' : 'danger', $message);

        return $success;
    }
}