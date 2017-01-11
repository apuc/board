<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.01.2017
 * Time: 11:14
 */

namespace frontend\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowSeo extends Widget
{
    public $title;
    public $description;
    public $img;


    public function run()
    {
        return $this->render('seo',
            [
                'title' => $this->title,
                'description' => $this->description,
                'img' => $this->img,
            ]);
    }
}