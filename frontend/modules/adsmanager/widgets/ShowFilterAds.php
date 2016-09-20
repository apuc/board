<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 15:18
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowFilterAds extends Widget
{


    public function run(){


        return $this->render('filter');
    }



}