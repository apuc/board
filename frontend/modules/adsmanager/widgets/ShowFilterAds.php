<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 15:18
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\Category;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\base\Widget;
use yii\db\Connection;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;

class ShowFilterAds extends Widget
{


    public function run(){
        $db = new Connection(\Yii::$app->db);
        $minMax = $db->createCommand('SELECT max(price) AS `max`, min(price) AS `min` from ads')
            ->queryOne();

		$selectMainCat = null;
		$parentCategories = null;

		$secondSelectCategoryId = null;
		$thirdSelectCategoryId = null;

        if(!empty($_GET['mainCat'])){
            $parentCategories = AdsCategory::getParentCategory($_GET['mainCat']);
            $selectMainCat = $_GET['mainCat'];
        }


        //Если переходим по ссылке с параметром 'slug'
        $slugWord = Yii::$app->request->get('slug');

        if($slugWord){
			$slugCategory = Category::find()->where(['slug' => $slugWord])->one();
		}

		if(!empty($slugCategory)){

			$catArr = AdsCategory::getListCategoryAllInfo($slugCategory->id, []);
			$catArr = array_reverse($catArr);


			if($slugCategory->parent_id == 0){
				$parentCategories = AdsCategory::getParentCategory($slugCategory->id);
				$selectMainCat = $slugCategory->id;
			}
			else{
	//			Debug::prn($catArr);
				$parentCategories = AdsCategory::getParentCategory($catArr[1]->parent_id);
				$selectMainCat = $catArr[1]->id;
				$secondSelectCategoryId = $catArr[1]->id;
			}
		}
		else {
			//Если категории для поиска не заданы получаем все главные категории
			$parentCategories = AdsCategory::getMainCategory();
		}

//		Debug::prn($parentCategories);

		//Если выбран втород дроп лист - запоминаем в переменную
		if(!empty($_GET['idCat'][1]) || isset($catArr[1])){
			if(!empty($_GET['idCat'][0])){
				$secondSelectCategoryId = $_GET['idCat'][1];
			}
		}

		//Если выбран третий дроп лист - запоминаем в переменную
		if(!empty($_GET['idCat'][2]) || isset($catArr[1])){
			if(!empty($_GET['idCat'][1])){
				$thirdSelectCategoryId = $_GET['idCat'][2];
			}
		}

        $selMinPrice = $minMax['min'];
        $selMaxPrice = $minMax['max'];
        if(!empty($_GET['minPrice'])){
            $selMinPrice = $_GET['minPrice'];
        }
        if(!empty($_GET['maxPrice'])){
            $selMaxPrice = $_GET['maxPrice'];
        }

		return $this->render('filter',[
				'minmax' => $minMax,
				'selectMainCat' => $selectMainCat,
				'parentCategories' => $parentCategories,
				'secondSelectCategoryId' => $secondSelectCategoryId,
				'thirdSelectCategoryId' => $thirdSelectCategoryId,
				'selMinPrice' => $selMinPrice,
				'selMaxPrice' => $selMaxPrice,
		]);
    }//run



}