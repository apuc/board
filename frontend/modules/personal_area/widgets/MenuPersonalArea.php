<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.03.2017
 * Time: 15:52
 */

namespace frontend\modules\personal_area\widgets;

use yii\base\Widget;

class MenuPersonalArea extends Widget
{

    public function run()
    {
        return $this->render('mpa');
    }

}