<?php


namespace api\controllers;


use api\models\Ads;
use common\classes\ApiFunction;
use common\classes\Debug;
use yii\web\Controller;
use yii\web\ServerErrorHttpException;
use frontend\modules\favorites\models\Favorites;

class FavouriteController extends Controller
{
    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if ($action->id == 'del-favourites') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     * @throws ServerErrorHttpException
     */
    public function actionGetFavourites(){

        $apiKey = \Yii::$app->request->get('api_key');
        $siteInfo = ApiFunction::getApiKey($apiKey);

        if(!empty($siteInfo->name)) {

            $currentUserId = \Yii::$app->request->get('id');

            $favourites = Ads::find()
                ->joinWith('adsImgs')
				->joinWith('adsGifs')
                ->joinWith('adsFieldsValues')
                ->joinWith('categoryAds')
                ->joinWith('city')
                ->leftJoin('favorites','ads.id = favorites.gist_id')
                ->asArray()
                ->andWhere(['favorites.user_id' => $currentUserId])
                ->all();

            return json_encode(['ads' => $favourites]);
        }else{
            throw new ServerErrorHttpException();
        }
    }

    public function actionDelFavourites(){

        $params = \Yii::$app->request->post('params');

        $siteInfo = ApiFunction::getApiKey($params['api_key']);

        if(!empty($siteInfo->name)) {
            Favorites::deleteAll(['gist_id' => $params['id'], 'user_id' => \Yii::$app->user->id]);
            return true;
        }

    }//actionDelFavourites

}