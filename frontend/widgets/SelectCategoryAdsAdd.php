<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.06.2016
 * Time: 22:38
 */

namespace frontend\widgets;


use backend\modules\category\models\Category;
use common\classes\Debug;
use yii\base\Widget;

class SelectCategoryAdsAdd extends Widget
{
    public function run()
    {
        $category = Category::find()->where(['parent_id' => 0])->all();
        Debug::prn($category);
    }
}