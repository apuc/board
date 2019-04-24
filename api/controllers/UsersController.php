<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 20.03.19
 * Time: 14:32
 */

namespace api\controllers;


use api\models\Ads;
use api\models\User;
use common\classes\ApiFunction;
use common\classes\Debug;
use dektrium\user\models\Token;
use frontend\models\user\Profile;
use Yii;
use yii\imagine\Image;
use yii\rest\ActiveController;
use yii\web\Request;

class UsersController extends ActiveController
{

    public $modelClass = 'api\models\User';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'user',
    ];

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    }


    public function actionView()
    {
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->get('api_key'));
        if (!isset($siteInfo->name)) return $siteInfo;

        $id = Yii::$app->request->get('id');
        $model = User::find()->where(['id' => $id])->one();

        return $model;
    }

    public function actionMe()
    {
//        $model = User::getByAuthKey(Yii::$app->request->get('token'));
        $userId = Yii::$app->user->identity->getId();
        $userModel = User::find()->with(['profile'])->where(['id' => $userId])->one();

        return $userModel;
    }//actionMe

    /**
     * @return array
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionAcupdate()
    {
        $post = Yii::$app->request->getBodyParams();
        $userModel = User::findOne($post['id']);

        if(!Yii::$app->security->validatePassword($post['old_pass'],$userModel->password_hash)){
            return ['success' => false, 'message' => 'Старый пароль введен неверно!'];
        }

        if($userModel->email !== $post['email']) {
            $message = 'Для изминения почтового адреса перейдите по ссылке в новом почтовом ящике.';

            $session = Yii::$app->session;
            if(!$session->isActive)
                $session->open();

            $session->set('newEmail', $post['email']);

            Yii::$app->mailer->compose('user/new-email',['authKey' => $userModel->auth_key])
                ->setFrom('admin@rub-on.ru')
                ->setTo($post['email'])
                ->setSubject('Изминение почтового адреса')
                ->send();
        }//if email changed

        if(isset($post['new_pass'])) {
            $userModel->password_hash = Yii::$app->security->generatePasswordHash($post['new_pass']);
        }
        $userModel->username = $post['username'];
        $userModel->save();

        return ['success' => true, 'message' => $userModel];
    }//actionAcupdate
    public function actionPfupdate()
    {
        $post = Yii::$app->request->post();

        $userProfile = \common\models\db\Profile::findOne($post['Profile']['user_id']);

        $userProfile->name = $post['Profile']['name'];
        $userProfile->public_email = $post['Profile']['public_email'];
        $userProfile->website = $post['Profile']['website'];

        Ads::updateAll(['mail' => $post['Profile']['public_email']],['=','user_id',$post['Profile']['user_id']]);

        if(!empty($_FILES['avatar']['name'])){

            $alias = Yii::getAlias('@frontend/web/');

            if (!file_exists($alias . 'media/users/' . $userProfile->user_id)) {
                mkdir($alias . 'media/users/' . $userProfile->user_id . '/');
            }

            $dir = 'media/users/' . $userProfile->user_id . '/';
            $extension = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

            Image::thumbnail($_FILES['avatar']['tmp_name'], 160, 160, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                ->save($alias . $dir . 'avatar.' . $extension, ['quality' => 100]);
            Image::thumbnail($_FILES['avatar']['tmp_name'], 31, 31, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                ->save($alias . $dir . 'avatar_little.' . $extension, ['quality' => 100]);

            $userProfile->avatar = '/' . $dir . 'avatar.' . $extension;
            $userProfile->avatar_little = '/' . $dir . 'avatar_little.' . $extension;
        }else{

            $avatar = json_decode($post['avatar']);
            if(!isset($avatar)){
                $userProfile->avatar = null;
                $userProfile->avatar_little = null;
            }
        }//else

        $userProfile->save();

        return $userProfile;
    }//actionUpdateProfile

    public function actionAcceptEmail()
    {
        $authKey = Yii::$app->request->get('authKey');

        $userModel = User::findOne(['auth_key' => $authKey]);

        if(!$userModel){
           return ['success' => false, 'message' => 'Изменить почту не удалось'];
        }

        $newEmail = Yii::$app->session->get('newEmail');
        if(!$newEmail) {
            return ['success' => false, 'message' => 'Сессия устарела. Изменить почту не удалось'];
        }
        $userModel->email = $newEmail;
        return ['success' => true, 'message' => $userModel];
    }//actionAcceptEmail

}//UserController