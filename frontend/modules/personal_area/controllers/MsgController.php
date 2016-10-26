<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 14:49
 */

namespace frontend\modules\personal_area\controllers;


use common\classes\Debug;

use frontend\modules\msg\models\Messages;
use yii\filters\AccessControl;
use yii\web\Controller;

class MsgController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionMessages(){
        $users = Messages::find()->where(['from_id'=>\Yii::$app->user->id])
            ->orWhere(['whom_id'=>\Yii::$app->user->id])
            ->all();

        $arr = [];
        foreach($users as $user){
            if($user->whom_id != \Yii::$app->user->id){
                $arr[] = $user->whom_id;
            }
            if($user->from_id != \Yii::$app->user->id){
                $arr[] = $user->from_id;
            }
        }

        $arr = array_unique($arr);

        return $this->render('msg2', ['users'=>$arr]);
    }

}