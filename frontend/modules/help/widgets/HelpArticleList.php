<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 13:42
 */

namespace frontend\modules\help\widgets;


use yii\base\Widget;

class HelpArticleList extends Widget
{

    public $list;
    public $title;

    public function run()
    {
        return $this->render('article_list', [
            'title' => $this->title,
            'list' => $this->list,
        ]);
    }

}