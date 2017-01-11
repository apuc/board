<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.01.2017
 * Time: 11:12
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowMetrika extends Widget
{
    public function run()
    {
        return $this->render('metrika');
    }
}