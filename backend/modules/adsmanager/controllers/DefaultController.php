<?php

namespace backend\modules\adsmanager\controllers;

use common\classes\Debug;
use common\models\db\AutoRia;
use common\models\db\Category;
use dektrium\user\helpers\Password;
use dektrium\user\models\User;
use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `adsmanager` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $ads = file_get_contents('https://developers.ria.com/auto/search?api_key=TeWSdsRIknmiw4fAFQcRDSFRpzSzDCPHrqxFhcpD&category_id=1&state[13]=13&city[13]=13&countpage=100');

        $adsListId = json_decode($ads);
//Debug::prn($adsListId);
        foreach ($adsListId->result->search_result->ids as $item) {

            $idAutoria = AutoRia::find()->where(['id_ads' => $item])->one();
            if(!empty($idAutoria)){
                break;
            }

            $autoRia = new AutoRia();
            $autoRia->id_ads = $item;
            $autoRia->save();


            $ads = file_get_contents('https://developers.ria.com/auto/info?api_key=TeWSdsRIknmiw4fAFQcRDSFRpzSzDCPHrqxFhcpD&auto_id=' . $item);
            $ads = json_decode($ads);
Debug::prn($ads);
            $model = new Ads();

            $model->region_id = 21;
            $model->city_id = 394;
            $model->dt_add = strtotime($ads->addDate);
            $model->dt_update = strtotime($ads->addDate);
            $model->content = $ads->autoData->description . '<a target="_blank" href="http://auto.ria.com'. $ads->linkToView .'">Подробнее на AutoRia.com</a>';
            $model->title = $ads->title;
            $model->price = $ads->UAH * 2;


            $phone = '+38' . str_replace(" ","", $ads->userPhoneData->phone);
            $model->phone = $phone;
            $model->name = 'AutoRia';
            //Debug::prn($phone);
            $email = str_replace('+', '',$phone) . '@rub-on.ru';
            $email = str_replace('(', '',$email);
            $email = str_replace(')', '',$email);
            $user = User::find()->where(['email' => $email])->one();
            /*Debug::prn($user);*/
            if (!empty($user)) {
                $model->user_id = $user->id;
            }
            else{

                $user = new User();
                $user->username = $email ;
                $user->email = $email;
                $password = Password::generate(6);
                $user->password_hash = Yii::$app->security->generatePasswordHash($password);
                $user->confirmed_at = time();
                $user->save();

                //Debug::prn($user);

                $model->user_id = $user->id;
            }

            $category = Category::find()->where(['name' => $ads->markName])->one();
            if(!empty($category)){
                $model->category_id = $category->id;
            }
            else{
                break;
            }


            $model->status = 1;
            $model->private_business = 0;

            if ($model->validate()) {
                // Debug::prn($model);
                //$model->save();
            }else{
                Debug::prn($model->errors);
            }




            //Debug::prn(json_decode($ads));
        }

        return $this->render('index');
    }
}
