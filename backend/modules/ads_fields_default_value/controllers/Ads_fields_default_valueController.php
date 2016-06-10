<?php

namespace backend\modules\ads_fields_default_value\controllers;

use common\models\db\AdsFields;
use Yii;
use backend\modules\ads_fields_default_value\models\Ads_fields_default_value;
use backend\modules\ads_fields_default_value\models\Ads_fields_default_valueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Ads_fields_default_valueController implements the CRUD actions for Ads_fields_default_value model.
 */
class Ads_fields_default_valueController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all Ads_fields_default_value models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Ads_fields_default_valueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ads_fields_default_value model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ads_fields_default_value model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ads_fields_default_value();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $fields = AdsFields::find()->all();
            return $this->render('create', [
                'model' => $model,
                'fields' => $fields,
            ]);
        }
    }

    /**
     * Updates an existing Ads_fields_default_value model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $fields = AdsFields::find()->all();
            return $this->render('update', [
                'model' => $model,
                'fields' => $fields,
            ]);
        }
    }

    /**
     * Deletes an existing Ads_fields_default_value model.
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
     * Finds the Ads_fields_default_value model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ads_fields_default_value the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ads_fields_default_value::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
