<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 20.03.19
 * Time: 14:32
 */

namespace api\controllers;


use api\models\User;
use common\classes\ApiFunction;
use common\classes\Debug;
use dektrium\user\models\Token;
use frontend\models\user\Profile;
use Yii;
use yii\rest\ActiveController;

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
        $model = User::getByAuthKey(Yii::$app->request->get('token'));

        return $model;
    }

    public function actionPfupdate()
    {
        $post = Yii::$app->request->post();

        $userProfile = \common\models\db\Profile::findOne($post['id']);


        $userProfile->name = $post['data']['Profile[name]'];
        $userProfile->public_email = $post['data']['Profile[public_email]'];
        $userProfile->website = $post['data']['Profile[website]'];


//        if(!empty($_FILES['Profile']['tmp_name']['avatar'])) {
//
//            if (!file_exists('media/users/' . Yii::$app->user->id)) {
//                mkdir('media/users/' . Yii::$app->user->id . '/');
//            }
//            $dir = 'media/users/' . Yii::$app->user->id . '/';
//
//            $extension = strtolower(substr(strrchr($_FILES['Profile']['name']['avatar'], '.'), 1));
//
//
//            Image::thumbnail($_FILES['Profile']['tmp_name']['avatar'], 160, 160, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
//                ->save($dir . 'avatar.' . $extension, ['quality' => 100]);
//            Image::thumbnail($_FILES['Profile']['tmp_name']['avatar'], 31, 31, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
//                ->save($dir . 'avatar_little.' . $extension, ['quality' => 100]);
//
//
//            $userProfile->avatar = '/' . $dir . 'avatar.' . $extension;
//            $userProfile->avatar_little = '/' . $dir . 'avatar_little.' . $extension;
//        }
//        else{
//            unset($userProfile->avatar);
//        }
//        $userProfile->save();
//
//        return $userProfile;
    }//actionUpdateProfile

}