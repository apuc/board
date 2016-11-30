<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 30.11.2016
 * Time: 11:29
 */

namespace frontend\modules\help\widgets;


use yii\base\Widget;

class SearchForm extends Widget
{

    public function run()
    {
        $search = '';
        if(\Yii::$app->request->post('search')){
            $search = \Yii::$app->request->post('search');
        }
        return $this->render('search',[
            'search' => $search
        ]);
    }

}