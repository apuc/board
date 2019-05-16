<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 05.05.2016
 * Time: 10:02
 */

namespace frontend\controllers\user;


use common\classes\Debug;
use dektrium\user\models\RecoveryForm;
use dektrium\user\models\Token;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\web\NotFoundHttpException;

use yii\web\Response;


class RecoveryController extends \dektrium\user\controllers\RecoveryController
{

    /**
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionRequest()
    {
        if (!$this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }

        /** @var RecoveryForm $model */
        $model = Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => 'request',
        ]);


        $event = $this->getFormEvent($model);
        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_REQUEST, $event);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Debug::prn($model);
            //die;
            $this->trigger(self::EVENT_AFTER_REQUEST, $event);
//            Debug::prn($model->sendRecoveryMessage());

            if($model->sendRecoveryMessage() === 2){
                return $this->render('not-user');
            }else{

                return $this->render('recovery-msg', [
                    'title'  => Yii::t('user', 'Recovery message sent'),
                    'module' => $this->module,
                ]);
            }
            //echo 123;
        }
        //Debug::prn($model->errors);
        //die;

        return $this->render('request', [
            'model' => $model,
        ]);
    }

//    /**
//     * Performs ajax validation.
//     * @param Model $model
//     * @throws \yii\base\ExitException
//     */
//    protected function performAjaxValidation(Model $model)
//    {
//        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
//            \Yii::$app->response->format = Response::FORMAT_JSON;
//            echo json_encode(RecoveryForm::validate($model));
//            \Yii::$app->end();
//        }
//    }


    /**
     * Displays page where user can reset password.
     *
     * @param int    $id
     * @param string $code
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionReset($id, $code)
    {
        if (!$this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }

        /** @var Token $token */
        $token = $this->finder->findToken(['user_id' => $id, 'code' => $code, 'type' => Token::TYPE_RECOVERY])->one();
        $event = $this->getResetPasswordEvent($token);

        $this->trigger(self::EVENT_BEFORE_TOKEN_VALIDATE, $event);

        if ($token === null || $token->isExpired || $token->user === null) {
            $this->trigger(self::EVENT_AFTER_TOKEN_VALIDATE, $event);
            //Yii::$app->session->setFlash('danger', Yii::t('user', 'Recovery link is invalid or expired. Please try requesting a new one.'));
            return $this->render('not-link', [
                'title'  => Yii::t('user', 'Invalid or expired link'),
                'module' => $this->module,
            ]);
        }

        /** @var RecoveryForm $model */
        $model = Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => 'reset',
        ]);
        $event->setForm($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_RESET, $event);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->resetPassword($token)) {
            $this->trigger(self::EVENT_AFTER_RESET, $event);

            return $this->render('passwordChanged',
                [
                    'title'  => Yii::t('user', 'Password has been changed'),
                    'module' => $this->module,
                ]);
        }

        return $this->render('reset', [
            'model' => $model,
        ]);
    }
}