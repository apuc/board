<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 15:49
 */

namespace frontend\modules\help\widgets;


use common\models\db\Help;
use yii\base\Widget;

class HelpRightBlock extends Widget
{

    public function run()
    {
        $order = Help::find()->orderBy('views DESC')->limit(3)->all();
        $last = Help::find()->limit(3)->all();
        return $this->render('right_block',[
            'order' => $order,
            'last' => $last,
        ]);
    }

}