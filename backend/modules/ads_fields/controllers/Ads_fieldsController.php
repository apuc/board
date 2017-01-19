<?php

namespace backend\modules\ads_fields\controllers;

use common\classes\Debug;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\AdsFieldsType;
use common\models\db\GroupAdsFields;
use Yii;
use backend\modules\ads_fields\models\Ads_fields;
use backend\modules\ads_fields\models\Ads_fieldsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Ads_fieldsController implements the CRUD actions for Ads_fields model.
 */
class Ads_fieldsController extends Controller
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
     * Lists all Ads_fields models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Ads_fieldsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ads_fields model.
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
     * Creates a new Ads_fields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ads_fields();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach ($_POST['group_id'] as $item) {
                $bond = new AdsFieldsGroupAdsFields();
                $bond->fields_id = $model->id;
                $bond->group_ads_fields_id = $item;
                $bond->save();
            }
            return $this->redirect(['index']);
        } else {

            $group = GroupAdsFields::find()->all();
            $type = AdsFieldsType::find()->all();
            $selectcat = null;
            return $this->render('create', [
                'model' => $model,
                'group' => $group,
                'type' => $type,
                'selectcat' => $selectcat,
            ]);
        }
    }

    /**
     * Updates an existing Ads_fields model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            AdsFieldsGroupAdsFields::deleteAll(['fields_id' => $id]);
            foreach ($_POST['group_id'] as $item) {
                $bond = new AdsFieldsGroupAdsFields();
                $bond->fields_id = $model->id;
                $bond->group_ads_fields_id = $item;
                $bond->save();
            }
            return $this->redirect(['index']);
        } else {
            $group = GroupAdsFields::find()->all();
            $type = AdsFieldsType::find()->all();
            $selectcat = AdsFieldsGroupAdsFields::find()->where(['fields_id' => $id])->all();

            $selcat = [];
            foreach ($selectcat as $item) {
                $selcat[] = $item->group_ads_fields_id;
            }

            return $this->render('update', [
                'model' => $model,
                'group' => $group,
                'type' => $type,
                'selectcat' => $selcat,
            ]);
        }
    }

    /**
     * Deletes an existing Ads_fields model.
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
     * Finds the Ads_fields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ads_fields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ads_fields::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
