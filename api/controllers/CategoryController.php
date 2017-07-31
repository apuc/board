<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 31.05.2017
 * Time: 11:05
 */

namespace api\controllers;

use api\models\Category;
use common\classes\Debug;
use Yii;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{
    public $modelClass = 'api\models\Category';

   /* public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items-category',
    ];*/

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        //Debug::prn(Yii::$app->request->queryParams);
        $searchModel = new Category();
        return $searchModel->getListCat(Yii::$app->request->queryParams);
    }
}