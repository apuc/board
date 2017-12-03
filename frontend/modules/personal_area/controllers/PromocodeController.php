<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 14.11.17
 * Time: 16:18
 */

namespace frontend\modules\personal_area\controllers;

use common\classes\Debug;
use common\models\db\Promokod;
use common\models\db\UserPromocode;
use frontend\models\user\UserDec;
use frontend\modules\personal_area\models\UserScore;
use frontend\modules\personal_area\models\UserScoreSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
class PromocodeController extends Controller
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

    public function actionIndex()
    {
        return $this->render('form-code');
    }

    public function actionAdd()
    {
        $post = \Yii::$app->request->post();
        $promo = Promokod::find()->where(['code' => $post['code'], 'status' => 1 ] )->one();

        if(empty($promo)){
            \Yii::$app->session->setFlash('success','Код введен неверно или не существует');
        }
        else{
            $userPromo = UserPromocode::find()
                ->where(['code_id' => $promo->id, 'user_id' => \Yii::$app->user->id])->one();

            if(!empty($userPromo)){
                \Yii::$app->session->setFlash('success','Код уже был использован Вами.');
            }else{
                $user = UserDec::find()->where(['id' => \Yii::$app->user->id] )->one();
                $userScore = new UserScore();

                $sumEdit = $user->score + $promo->price;

                $userScore->user_id = $user->id;
                $userScore->sum = $promo->price;
                $userScore->deb_kred = 1;
                $userScore->name = 'Пополнение счета';
                UserDec::updateAll(['score' => $sumEdit], ['id' => $user->id]);
                $userScore->save();

                $userPromocode = new UserPromocode();
                $userPromocode->user_id = $user->id;
                $userPromocode->code_id = $promo->id;
                $userPromocode->dt_add = time();
                $userPromocode->save();

                if($promo->one_time == 1){
                    $promo->status = 0;
                    $promo->save();
                }

                \Yii::$app->session->setFlash('success','Счет пополнен.');
            }

        }

        //Debug::prn($promo);

        return $this->redirect(['index']);
    }
}