<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 06.11.2017
 * Time: 20:38
 */

namespace console\controllers;

use common\models\db\Ads;
use yii\console\Controller;

class AdsViewEditController extends Controller
{
    public function actionIndex()
    {
        $news = Ads::find()
            ->where(['!=', 'status',  [1, 3, 5, 6]])
            ->andWhere(['>=', 'dt_update', time() - 86400*7])
            ->andWhere(['site_id' => 0])
            ->all();

        foreach ($news as $item){
            $randNumber = rand(1,10);
            Ads::updateAllCounters(['views' => $randNumber], ['id' => $item->id]);
            echo 'ID объявления - ' . $item->id .  ' Увеличено на ' . $randNumber . "\n";
        }
    }
}