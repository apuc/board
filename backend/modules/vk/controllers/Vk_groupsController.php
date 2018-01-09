<?php

namespace backend\modules\vk\controllers;

use common\classes\Debug;
use common\models\db\VkProduct;
use common\models\db\VkProductPhoto;
use common\models\VK;
use Yii;
use backend\modules\vk\models\VkGroups;
use backend\modules\vk\models\VkGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Vk_groupsController implements the CRUD actions for VkGroups model.
 */
class Vk_groupsController extends Controller
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
     * Lists all VkGroups models.
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function actionIndex()
    {
        $searchModel = new VkGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VkGroups model.
     * @param integer $id
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VkGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function actionCreate()
    {
        $model = new VkGroups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VkGroups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VkGroups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetProd($id)
    {
        $model = \common\models\db\VkGroups::find()->where(['id' => $id])->one();
        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);

        $res = json_decode($vk->getProducts($model->owner_id,['count'=>200, 'extended'=>1]));
        $count = 0;
        if(isset($res->response->items)){
            foreach ((array)$res->response->items as $item){
                if(!VkProduct::find()->where(['vk_id' => $item->id, 'owner_id' => $item->owner_id])->one()){
                    $model = new VkProduct();
                    $model->vk_id = $item->id;
                    $model->owner_id = $item->owner_id;
                    $model->title = $item->title;
                    $model->description = $item->description;
                    $model->price = $item->price->amount / 100;
                    $model->currency = $item->price->currency->name;
                    $model->cat_id = $item->category->id;
                    $model->dt_add = $item->date;
                    $model->thumb_photo = $item->thumb_photo;
                    $model->save();
                    if(isset($item->photos)){
                        $photos = new VkProductPhoto();
                        $photos->savePhotos($item->photos, $model->id);
                    }
                    $count++;
                }
            }
        }
        return $this->render('get_products', ['count' => $count]);
    }

    /**
     * Finds the VkGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VkGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VkGroups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
