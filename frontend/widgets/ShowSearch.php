<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 13:53
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowSearch extends Widget
{

    public function run(){
        return $this->render('search');
    }
}