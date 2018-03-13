<?php

namespace backend\modules\adsmanager\controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use common\behaviors\AccessSecure;
use common\classes\Debug;
use common\classes\GeoFunction;
use common\models\db\Ads;
use common\models\db\AdsImg;
use common\models\Item;
use common\models\Xml;
use common\models\Search;
use common\models\VK;
use Yii;
use backend\modules\adsmanager\models\Adsmanager;
use backend\modules\adsmanager\models\AdsmanagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdsmanagerController implements the CRUD actions for Adsmanager model.
 */
class AdsmanagerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'publication' => ['GET'],
                    'remove_publication' => ['GET'],
                ],
            ],
            'AccessSecure' => [
                'class' => AccessSecure::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'delete-img') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all Adsmanager models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdsmanagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adsmanager model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = \frontend\modules\adsmanager\models\Ads::find()
            ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['`ads`.`id`' => $id])
            ->with('ads_fields_value', 'user', 'ads_img', 'geobase_city')
            ->one();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Adsmanager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Adsmanager();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Adsmanager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Adsmanager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSend($slug)
    {
        $model = Ads::find()->where(['slug' => $slug])->one();
        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '8adeaefb2335ed6e0d28282823b3af1d1329d3d5bb48077ee9950f280cc113df1cf7d7a3b61c2b460f5a8',
        ]);

        $ownerId = '-38312345';

        $postId = $vk->setPostToGroup($ownerId, [
            'from_group' => 1,
            'attachments' => 'https://rub-on.ru/ads/' . $slug,
        ]);
        $model->post_vk = 1;
        $model->save();
        //return $this->redirect(['index']);
    }

    public function actionSendTw($slug)
    {
        $model = Ads::find()->where(['slug' => $slug])->one();
        $categoryList = \common\classes\AdsCategory::getListCategoryAllInfo($model->category_id, []);
        $city = GeoFunction::getCityName($model->city_id);
        $arrTags = [];
        foreach ($categoryList as $item) {
            $arr = explode(' ', mb_strtolower($item->name));
            $arrTags = array_merge($arrTags, $arr);
        }
        $defaultTags = '#rubon #ДоскаОбъявлений #' . $city;
        $arrStr = implode(' ', array_map(function ($item) {
            if (strlen($item) > 2) {
                $item = str_replace('/', ' #', $item);
                $item = str_replace(',', ' ', $item);
                return '#' . $item;
            }
        }, array_unique($arrTags)));

        $connection = new TwitterOAuth(
            'wvFJ8e9H2srypMXDcVkUB1Ebm',
            'rR21MJkF0PlmcZvnaIWrqsq2oNLpEOc2AEfOD71w4UNrMBpGkK',
            '818440355309846528-xrlDwxr1JxWrLYBFVpXuw3XPTGUiQq6',
            'GPbrt8v6nz2MJFAA0nCyuZVEdOTEAfOyFacev8r6fHuH3');
        $postit = $connection->post("statuses/update",
            ["status" => $defaultTags . ' ' . $arrStr . ' https://rub-on.ru/ads/' . $slug]);
        $model->post_tw = 1;
        $model->save();
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Adsmanager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adsmanager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adsmanager::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEdit_status()
    {
        Ads::updateAll(['status' => $_POST['status']], ['id' => $_POST['id']]);
    }

    public function actionRemove_publication($id)
    {

        Ads::updateAll(['status' => 6], ['id' => $id]);
        $model = Adsmanager::findOne($id);
        $subject = 'Объявление не прошло модерацию';

        Yii::$app->mailer->compose('ads/no-moder', ['product' => $model])
            ->setTo($model->mail)
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();
        return $this->redirect('index');
    }

    public function actionDelete_publication($id)
    {

        Ads::updateAll(['status' => 3], ['id' => $id]);
        /*$model = Adsmanager::findOne($id);
        $subject = 'Объявление не прошло модерацию';

        Yii::$app->mailer->compose('ads/no-moder',['product'=>$model])
            ->setTo($model->mail)
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();*/
        return $this->redirect('index');
    }

    public function actionDeleteImg()
    {
        AdsImg::deleteAll(['id' => Yii::$app->request->post('id')]);
    }

    public function actionPublication($id)
    {

        Ads::updateAll(['status' => 2, 'dt_update' => time()], ['id' => $id]);
        $model = Adsmanager::findOne($id);
        $subject = 'Объявление опубликовано';

        Yii::$app->mailer->compose('ads/y-moder', ['product' => $model])
            ->setTo($model->mail)
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();
        return $this->redirect('index');
    }

    public function actionCheckYa($id)
    {
        $model = Ads::findOne($id);
        $has = Search::check('https://rub-on.ru/ads/' . $model->slug, 'ya');
        $model->check_ya = $has ? 1 : null;
        $model->save();
    }

    public function actionCheckGoogle($id)
    {
        $model = Ads::findOne($id);
        $has = Search::check('https://rub-on.ru/ads/' . $model->slug, 'google');
        $model->check_google = $has ? 1 : null;
        $model->save();
    }

    public function actionCheckSearch($id)
    {
        $this->layout = 'empty';
        $model = Ads::findOne($id);
        $has = Search::check('https://rub-on.ru/ads/' . $model->slug);
        $model->check_google = $has['google'] ? 1 : null;
        $model->check_ya = $has['ya'] ? 1 : null;
        $model->save();
        return $this->render('check-link', ['has' => $has]);
    }

    public function actionTestP()
    {
        $item = new Item('rss');
        $item->setAttribute('xmlns:yandex', 'http://news.yandex.ru');
        $item->setAttribute('xmlns:media', 'http://search.yahoo.com/mrss/');

        $channel = new Item('channel');
        $channel->setContent('rtrtr');
        $item->addChildItem($channel);

        $xml = Xml::generate($item);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        return $this->renderPartial('xml', ['xml' => $xml]);
    }
}
