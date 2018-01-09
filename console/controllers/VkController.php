<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.01.2018
 * Time: 2:21
 */

namespace console\controllers;

use common\classes\Debug;
use common\models\db\VkProductCat;
use common\models\VK;
use yii\console\Controller;

class VkController extends Controller
{

    public function actionGetCat()
    {
        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            //'access_token' => '8adeaefb2335ed6e0d28282823b3af1d1329d3d5bb48077ee9950f280cc113df1cf7d7a3b61c2b460f5a8',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);

        $res = json_decode($vk->getProductCat());
        foreach ($res->response->items as $item) {
            $cat = new VkProductCat();
            $cat->cat_id = $item->id;
            $cat->cat_name = $item->name;
            $cat->section_id = $item->section->id;
            $cat->section_name = $item->section->name;
            $cat->save();
            echo 'add cat' . "\n";
        }
        echo 'done';
    }

}