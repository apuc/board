<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 12:43
 */

namespace frontend\modules\help\widgets;


use common\models\db\CategoryHelp;
use yii\base\Widget;

class HelpLeftMenu extends Widget
{

    public function run()
    {
        $category = CategoryHelp::find()->all();
        $c = [];
        foreach($category as $item){
            if($item->parent_id == 0){
                $c[$item->id]['name'] = $item->name;
            }
            else {
                $c[$item->parent_id]['child'][$item->id] = $item->name;
            }

        }

        return $this->render('left_menu', [
            'category' => $c
        ]);
    }

}