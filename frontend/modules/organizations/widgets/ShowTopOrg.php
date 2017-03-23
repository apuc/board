<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 21.02.2017
 * Time: 22:26
 */

namespace frontend\modules\organizations\widgets;


use frontend\modules\organizations\models\OrgInfo;
use yii\base\Widget;

class ShowTopOrg extends Widget
{
    public function run(){
        $org = OrgInfo::find()
            ->andWhere(['status' => [2,4]])
            ->orderBy('views DESC')
            ->limit(25)
            ->all();
        return $this->render('top-org', ['org' => $org]);
    }
}