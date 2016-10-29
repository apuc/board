<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 15:35
 */

namespace frontend\modules\help\widgets;


use yii\base\Widget;

class HelpBread extends Widget
{

    public function run()
    {
        return $this->render('bread');
    }

}