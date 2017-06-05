<?php

namespace backend\modules\adsmanager\controllers;

use common\classes\Debug;
use common\models\db\Ads;
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
        ];
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
            ->with('ads_fields_value','user','ads_img','geobase_city')
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

    public function actionEdit_status(){
        Ads::updateAll(['status' => $_POST['status']], ['id' => $_POST['id']]);
    }

    public function actionRemove_publication($id){

        Ads::updateAll(['status' => 6], ['id' => $id]);
        $model = Adsmanager::findOne($id);
        $subject = 'Объявление не прошло модерацию';

        Yii::$app->mailer->compose('ads/no-moder',['product'=>$model])
            ->setTo($model->mail)
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();
        return $this->redirect('index');
    }

    public function actionPublication($id){

        Ads::updateAll(['status' => 2, 'dt_update' => time()], ['id' => $id]);
        $model = Adsmanager::findOne($id);
        $subject = 'Объявление опубликовано';

        Yii::$app->mailer->compose('ads/y-moder',['product'=>$model])
            ->setTo($model->mail)
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject($subject)
            ->send();
        return $this->redirect('index');
    }
}
