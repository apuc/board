<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 15:46
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\Category;
use yii\base\Widget;

class ShowSelectCategoryFilter extends Widget
{

    public function run(){

        if(isset($_GET['mainCat'])){
            $currentCategory = Category::find()->where(['id' => $_GET['mainCat']])->one();;
        }else{
            $currentCategory = AdsCategory::getCurrentMainCategory();
        }

        //Debug::prn($currentCategory);
        return $this->render('select-category-filter',
            [
                'category' => AdsCategory::getMainCategory(),
                'currentCategory' => $currentCategory,
            ]);
    }
}