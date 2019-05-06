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
                ->joinWith('adsFieldsValues')
                ->joinWith('categoryAds')
                ->joinWith('city')
                ->leftJoin('favorites','ads.id = favorites.gist_id')
                ->andWhere(['favorites.user_id' => $currentUserId])
                ->all();

            return $favourites;
        }else{
            throw new ServerErrorHttpException();
        }
    }

    public function actionDel_favorites(){
        Favorites::deleteAll(['gist' => $_POST['gist'], 'gist_id' => $_POST['gistId'], 'user_id' => \Yii::$app->user->id]);
    }

}