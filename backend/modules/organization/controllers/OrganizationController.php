<?php

namespace backend\modules\organization\controllers;

use common\behaviors\AccessSecure;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\User;
use Yii;
use backend\modules\organization\models\Organizations;
use backend\modules\organization\models\OrganizationsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\db\Category;

/**
 * OrganizationController implements the CRUD actions for Organizations model.
 */
class OrganizationController extends Controller
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

    /**
     * Lists all Organizations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganizationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organizations model.
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
     * Creates a new Organizations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organizations();

        $categories = ArrayHelper::map(Category::find()->all(),'id','name');
        $regions = ArrayHelper::map(GeobaseRegion::find()->all(),'id','name');
        $city = ArrayHelper::map(GeobaseCity::find()->all(),'id','name');
        $users = ArrayHelper::map(User::find()->all(),'id','email');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
                'regions' => $regions,
                'city' => $city,
                'users' => $users,
            ]);
        }
    }

    /**
     * Updates an existing Organizations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        $categories = ArrayHelper::map(Category::find()->all(),'id','name');
        $regions = ArrayHelper::map(GeobaseRegion::find()->all(),'id','name');
        $city = ArrayHelper::map(GeobaseCity::find()->all(),'id','name');
        $users = ArrayHelper::map(User::find()->all(),'id','email');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'regions' => $regions,
                'city' => $city,
                'users' => $users,
            ]);
        }
    }

    /**
     * Deletes an existing Organizations model.
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
     * Finds the Organizations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organizations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organizations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
