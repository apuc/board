<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 09.02.2017
 * Time: 20:45
 */

namespace frontend\modules\news\widgets;


use common\models\db\News;
use yii\base\Widget;

class ShowSimilarNews extends Widget
{
    public $id;
    public function run(){
        $model = News::find()->where(['!=', 'id', $this->id])->orderBy('dt_add DESC')->limit(4)->all();
        return $this->render('similar-news', ['model' => $model]);
    }
}