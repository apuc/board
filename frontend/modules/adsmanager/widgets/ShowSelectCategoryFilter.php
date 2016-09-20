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
use yii\base\Widget;

class ShowSelectCategoryFilter extends Widget
{

    public function run(){

        $currentCategory = AdsCategory::getCurrentMainCategory();
        //Debug::prn($currentCategory);
        return $this->render('select-category-filter',
            [
                'category' => AdsCategory::getMainCategory(),
                'currentCategory' => $currentCategory,
            ]);
    }
}