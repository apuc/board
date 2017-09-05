<?php

namespace backend\modules\adsmanager\controllers;

use api\models\City;
use common\classes\Debug;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsValue;
use common\models\db\AdsImg;
use common\models\db\AutoRia;
use common\models\db\Category;
use common\models\db\GeobaseCity;
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
        if(Yii::$app->request->post()){

            //Debug::prn($_POST);
            $cityR = City::find()->where(['id' => Yii::$app->request->post('city_id')])->one();

            $arrParsCityDnr =
                [
                    '394' => '13',
                    '640' => '99',
                    '388' => '104',
                    '389' => '105',
                    '395' => '109',
                    '396' => '110',
                    '403' => '116',
                    '411' => '128',
                    '413' => '130',
                ];
            $arrParsCityLnr =
                [
                    '356' => '17',
                    '349' => '258',
                    '353' => '265',
                    '361' => '281',
                ];

            if($cityR->region_id == '21'){
                $regParse = 13;
                $cityParse = $arrParsCityDnr[Yii::$app->request->post('city_id')];
            }
            if($cityR->region_id == '19'){
                $regParse = 17;
                $cityParse = $arrParsCityLnr[Yii::$app->request->post('city_id')];
            }
            if(!empty($regParse) && !empty($cityParse)){
                /*Debug::prn($regParse);
                Debug::prn($cityParse);*/
                $ads = file_get_contents('https://developers.ria.com/auto/search?api_key=TeWSdsRIknmiw4fAFQcRDSFRpzSzDCPHrqxFhcpD&category_id=2&state['. $regParse .']='. $regParse.'&city['. $cityParse .']='. $cityParse .'&countpage=50&page='. Yii::$app->request->post('page', 1));
            }

/*Debug::prn($regParse);
Debug::prn($cityParse);*/
            /*$city = file_get_contents('https://developers.ria.com/auto/states/17/cities?api_key=TeWSdsRIknmiw4fAFQcRDSFRpzSzDCPHrqxFhcpD');
            Debug::prn(json_decode($city));*/




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
               // Debug::prn($ads);
                $model = new Ads();

                $model->region_id = $cityR->region_id;
                $model->city_id = Yii::$app->request->post('city_id');
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
                    $model->save();
                }else{
                    Debug::prn($model->errors);
                }

                $adsFieldValueId = AdsFieldsDefaultValue::find()->where(['value' => $ads->modelName])->one();
                if(!empty($adsFieldValueId)){
                    $adsFieldValue = new AdsFieldsValue();
                    $adsFieldValue->ads_id = $model->id;
                    $adsFieldValue->ads_fields_name = $ads->markName;
                    $adsFieldValue->value = $ads->modelName;
                    $adsFieldValue->value_id = $adsFieldValueId->id;
                    $adsFieldValue->save();
                }
                if(!empty($ads->autoData->year)){
                    $adsFieldValue = new AdsFieldsValue();
                    $adsFieldValue->ads_id = $model->id;
                    $adsFieldValue->ads_fields_name = 'year-vipusk';
                    $adsFieldValue->value = $ads->autoData->year;
                    $adsFieldValue->save();
                }
                if(!empty($ads->autoData->race)){
                    $adsFieldValue = new AdsFieldsValue();
                    $adsFieldValue->ads_id = $model->id;
                    $adsFieldValue->ads_fields_name = 'probeg';
                    $adsFieldValue->value = $ads->autoData->race;
                    $adsFieldValue->save();
                }
                if(!empty($ads->photoData)){
                    $adsImg = new AdsImg();
                    $adsImg->ads_id = $model->id;
                    if(!empty($ads->photoData->seoLinkM) && !empty($ads->photoData->seoLinkF)){
                        $adsImg->img_thumb = $ads->photoData->seoLinkM;
                        $adsImg->img = $ads->photoData->seoLinkF;
                    } else{
                        break;
                    }

                    $adsImg->user_id = $model->user_id;
                    $adsImg->save();
                }







                //Debug::prn(json_decode($ads));
            }

        }


        $city = GeobaseCity::find()
            ->select([
                '`geobase_city`.`name` as value',
                '`geobase_city`.`name` as  label',
                '`geobase_city`.`id` as id',
                '`geobase_region`.`name` as region_name',
                '`geobase_region`.`id` as region_id'
            ])
            ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
            ->where(['`geobase_region`.`id`' => [21,19]])
            ->orderBy('`geobase_region`.`name`')
            ->addOrderBy('`geobase_city`.`name`')
            ->asArray()
            ->all();

        $i = 0;
        $data = [];
        foreach ($city as $item) {
            $data[$item['region_name']][$item['id']] = $item['value'];
        }

        return $this->render('index',
            [
                'arraregCity' => $data,
            ]);
    }

    public function actionDom()
    {

    }
}
