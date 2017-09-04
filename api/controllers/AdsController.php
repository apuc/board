<?php


namespace api\controllers;

use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsImg;
use dektrium\user\helpers\Password;
use dektrium\user\models\User;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\adsmanager\models\FilterAds;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class AdsController extends ActiveController
{
    public $modelClass = 'api\models\Ads';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'ads',
    ];

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['delete']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        //Debug::prn(Yii::$app->request->queryParams);
        $searchModel = new \api\models\Ads();
        return $searchModel->getListAds(Yii::$app->request->queryParams);
    }

    public function actionCreate()
    {
        $model = new Ads();
        //$ads = json_decode(Yii::$app->request->post(), true);
        //Debug::prn($_POST);
        if ($model->load(Yii::$app->request->post()) /*&& $model->validate()*/) {

            $user = User::find()->where(['email' => $model->mail])->one();
            //Debug::prn($user);
            if (!empty($user)) {
                $model->user_id = $user->id;
            }
            else{
                $user = new User();
                $user->username = $model->mail;
                $user->email = $model->mail;
                $password = Password::generate(6);
                $user->password_hash = Yii::$app->security->generatePasswordHash($password);
                $user->confirmed_at = time();
                $user->save();
                $model->user_id = $user->id;

                $subject = 'Новое объявление';
                Yii::$app->mailer->compose('user/add-user',
                    [
                        'password'=>$password,
                        'mail' => $model->mail
                    ]
                )
                    ->setTo($model->mail)
                    ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                    ->setSubject($subject)
                    ->send();

            }

            $model->status = 1;
            $model->private_business = 0;

            if ($model->validate()) {
                $model->save();
            }

            if (!empty($_POST['AdsField'])) {
                \common\classes\Ads::saveAdsFields($_POST['AdsField'], $model->id);
            }

            if (!empty($_POST['img'])) {
                foreach ($_POST['img'] as $item) {
                    $adsImg = new AdsImg();
                    $adsImg->user_id = $user->id;
                    $adsImg->img_thumb = $item['img_thumb'];
                    $adsImg->img = $item['img'];
                    $adsImg->ads_id = $model->id;
                    $adsImg->save();
                }
            }

            //$model->save();

            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            //Debug::prn(123);
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }

    public function actionSearch()
    {
        $model = new \api\models\Ads();

        $ads = $model->searchFilterGet(Yii::$app->request->queryParams);

        return $ads;
    }

    //Получить label дополнительного поля
    public function actionGetLabelAdditionalField($name)
    {
        $label = AdsFields::find()->where(['name' => $name])->one()->label;
        return str_replace('Выберите модель ', '', $label);
    }

    public function actionEdit()
    {
        \common\models\db\Ads::updateAll(['status' => 3], ['id' => Yii::$app->request->get('id')]);
        //Debug::prn($_GET);

    }

    /*public function verbs()
    {
        return [
            'delete' => ['put', 'patch'],
        ];
    }*/

}