<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.01.2017
 * Time: 11:39
 */

namespace frontend\modules\organizations\widgets;


use common\models\db\CategoryOrganizations;
use yii\base\Widget;

class CategoryBar extends Widget
{

    public function run()
    {
        return $this->render('category_bar',[
            //'category' => CategoryOrganizations::
        ]);
    }

}