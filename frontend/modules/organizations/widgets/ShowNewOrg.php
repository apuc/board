<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 21.02.2017
 * Time: 22:10
 */

namespace frontend\modules\organizations\widgets;


use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowNewOrg extends Widget
{
    public function run()
    {
        $org = OrgInfo::find()
            ->andWhere(['status' => [2,4]])
            ->orderBy('dt_add DESC')
            ->limit(25)
            ->all();
        return $this->render('new-org', ['org' => $org]);

    }
}