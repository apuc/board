<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 04.05.2016
 * Time: 12:42
 */

namespace frontend\controllers\user;


use common\classes\Debug;
use dektrium\user\controllers\RegistrationController;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\ResendForm;
use dektrium\user\models\Token;
use frontend\models\user\UserDec;
use Yii;
use yii\web\NotFoundHttpException;

class RegUserController extends RegistrationController
{

    public $layout = "@app/views/layouts/main";

    /**
     * Displays the registration page.
     * After successful registration if enableConfirmation is enabled shows info message otherwise redirects to home page.
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->register()) {

            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            $link = explode('@',$_POST['register-form']['email']);

            return $this->render('@app/views/user/registration/reg-message', [
                'title'  => Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
                'link' => $link[1],
            ]);
        }

        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionResend()
    {
        if ($this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        /** @var ResendForm $model */
        $model = Yii::createObject(ResendForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_RESEND, $event);

//        Debug::prn($_POST);
        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->resend()) {

            $this->trigger(self::EVENT_AFTER_RESEND, $event);

            $link = explode('@',$_POST['resend-form']['email']);
            return $this->render('@app/views/user/registration/reg-message', [
                'title'  => Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
                'link' => $link[1],
            ]);
        }
        return $this->render('resend', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id
     * @param string $code
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionConfirm($id, $code)
    {
        $user = $this->finder->findUserById($id);

        if ($user === null || $this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $event = $this->getUserEvent($user);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);

        //Если токен устарел или он не найден в базе
        if(!$user->attemptConfirmation($code)){
            return $this->redirect(['/resend']);
        }

        $this->trigger(self::EVENT_AFTER_CONFIRM, $event);
        return $this->render('confirmInfo', [
            'title'  => Yii::t('user', 'Account confirmation'),
            'module' => $this->module
        ]);
    }



    /**
     * Displays page where user can create new account that will be connected to social account.
     *
     * @param string $code
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionConnect($code)
    {
        $account = $this->finder->findAccount()->byCode($code)->one();

        if ($account === null || $account->getIsConnected()) {
            throw new NotFoundHttpException();
        }

        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => UserDec::className(),
            'scenario' => 'connect',
            'username' => $account->username,
            'email'    => $account->email,
        ]);

        $event = $this->getConnectEvent($account, $user);

        $this->trigger(self::EVENT_BEFORE_CONNECT, $event);

        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            $account->connect($user);

            \Yii::$app->user->login($user, $this->module->rememberFor);
            $this->trigger(self::EVENT_AFTER_CONNECT, $event);
            return $this->goBack();
        }

        return $this->render('connect', [
            'model'   => $user,
            'account' => $account,
        ]);
    }

}