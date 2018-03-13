<?php

namespace frontend\modules\turbo\controllers;

use common\models\db\Ads;
use common\models\Item;
use common\models\Xml;
use yii\web\Controller;

/**
 * Default controller for the `turbo` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionIndex()
    {
        $ads = Ads::find()
            ->with(['user', 'adsImgs'])
            ->where(['status' => 2])
            ->limit(30)
            ->orderBy('id DESC')
            ->all();

        $item = new Item('rss');
        $item->setAttribute('xmlns:yandex', 'http://news.yandex.ru');
        $item->setAttribute('xmlns:media', 'http://search.yahoo.com/mrss/');
        $item->setAttribute('xmlns:turbo', 'http://turbo.yandex.ru');

        $channel = new Item('channel');

        foreach ($ads as $ad){
            //Создаем item
            $adItem = new Item('item');
            $adItem->setAttribute('turbo', 'true');

            //Создаем ссылку
            $link = new Item('link');
            $link->setContent('https://rub-on.ru/ads/' . $ad->slug);
            $adItem->addChildItem($link);

            //Создаем контент
            $content = new Item('turbo:content');
            $content->setContent($this->renderPartial('ad-turbo', ['ad' => $ad]));
            $adItem->addChildItem($content);

            $channel->addChildItem($adItem);
        }

        $item->addChildItem($channel);

        $xml = Xml::generate($item);
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        return $this->renderPartial('xml', ['xml' => $xml]);
    }
}
