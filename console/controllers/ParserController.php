<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 05.12.17
 * Time: 10:05
 */

namespace console\controllers;

use backend\modules\parser\models\Parser;
use backend\modules\parser\models\ParserFunction;
use backend\modules\parser\models\SimpleHTMLDom;
use common\classes\Debug;
use common\models\db\AdsImg;
use common\models\db\Olx;
use frontend\modules\adsmanager\models\Ads;
use TesseractOCR;
use yii\imagine\Image;
use yii\console\Controller;

class ParserController extends Controller
{
    public $url;
    public $category;
    public $city;

    public function options($actionID)
    {
        $options = parent::options($actionID);
        if ($actionID == 'index') {
            $options[] = 'url';
            $options[] = 'category';
            $options[] = 'city';
        }
        return $options;
    }

    public function actionIndex()
    {
        echo $this->url;
        echo "success \n";
        die();
        if (isset($_GET)) {
            $parser = new Parser();
            //$html = $parser->curlGet('https://www.olx.ua/transport/legkovye-avtomobili/vaz/donetsk/');
            //$html = $parser->curlGet('https://www.olx.ua/nedvizhimost/prodazha-kvartir/donetsk/');
            $html = $parser->curlGet($_GET['url']);

            $dom = SimpleHTMLDom::str_get_html($html);

            $links = $dom->find('table#offers_table tbody tr.wrap');
            foreach ($links as $link) {
                //Получаем ссылку на объявление
                $a = $link->find('a', 0);

                //получение цены
                $price = $link->find('p.price strong', 0);

                //Debug::prn($price->plaintext);
                $priceAds = ParserFunction::getPrice($price->plaintext);

                //Получаем slug объявления
                $linkArr = explode('/', $a->href);
                $link = array_pop($linkArr);

                //Запрос нга страницу печати
                $one = $parser->curlGet('https://www.olx.ua/print/' . $link);
                $domOne = SimpleHTMLDom::str_get_html($one);

                $adsIdOlx = $domOne->find('h3 small', 0);
                $adsIdOlx = explode(' ', $adsIdOlx->plaintext);
                $adsIdOlx = array_pop($adsIdOlx);

                $idOLX = Olx::find()->where(['id_ads' => $adsIdOlx])->one();
                if (!empty($idOLX)) {
                    continue;
                } else {
                    $autoRia = new Olx();
                    $autoRia->id_ads = $adsIdOlx;
                    $autoRia->save();
                }

                //Начинаем заполнять объявление
                $model = new Ads;

                if (empty($priceAds)) {
                    continue;
                } else {
                    $model->price = $priceAds;
                }

                //Телефон
                $phone = $domOne->find('li.phone strong', 0);

                if (empty($phone)) {
                    $phone = $domOne->find('li.phone img', 0);
                    if (empty($phone->src)) {
                        continue;
                    }
                    copy($phone->src, $_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/image.png');
                    /*$urlPhoneImg = file_get_contents($phone->src);
                    /*Debug::prn($phone->src);
                    die();
                    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/image.png', $urlPhoneImg );*/
                    Image::watermark($_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/111.jpg',
                        $_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/image.png')
                        ->save($_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/imagePhone.png', ['quality' => 100]);

                    $tesseract = new TesseractOCR($_SERVER['DOCUMENT_ROOT'] . '/backend/web/phoneImg/imagePhone.png');
                    $phone = $tesseract->run();
                } else {
                    $phone = $phone->plaintext;
                }

                //Создаем пользователя или получаем его id
                $model->user_id = ParserFunction::getUser(str_replace(" ", "", $phone) . '@rub-on.ru');
                $model->phone = $phone;

                //Имя пользователя
                $name = $domOne->find('li.person strong', 0);
                $model->name = $name->plaintext;

                //Заголовок
                $model->title = trim($domOne->find('h2 span', 0)->plaintext);

                //Изображения

                $img = $domOne->find('div.gallery div p img', 0);

                $detailsAdsOlx = $domOne->find('div.details', 0);
                //Debug::prn($detailsAdsOlx->plaintext);

                if (!empty($img->src)) {
                    //Описание
                    $content = trim($domOne->find('div.wrapper p', 1)->plaintext) . $detailsAdsOlx;
                } else {
                    $content = trim($domOne->find('div.wrapper p', 0)->plaintext) . $detailsAdsOlx;
                }

                $model->content = $content;

                $model->status = 1;
                $model->private_business = 0;

                $model->pars = 1;
                //$model->region_id = 21;
                $model->city_id = $_GET['city_id'];

                $model->category_id = $_GET['category'];

                if ($model->validate()) {
                    //Debug::prn($model);
                    $model->save();
                } else {
                    Debug::prn($model->errors);
                }

                ///ИЗОБРАЖЕНИЯ

                $adsImg = [];
                if (!empty($img->src)) {

                    $adsImg[0]['ads_id'] = $model->id;
                    $adsImg[0]['img'] = $img->src;
                    $adsImg[0]['img_thumb'] = $img->src;
                    $adsImg[0]['user_id'] = $model->user_id;
                }

                $allImg = $domOne->find('div.gallery div p');
                if (!empty($allImg)) {
                    $i = 1;
                    foreach ($allImg as $item) {
                        //$img
                        $oneImgG = $item->find('img', 0);
                        if (!empty($oneImgG->src)) {
                            $adsImg[$i]['ads_id'] = $model->id;
                            $adsImg[$i]['img'] = $oneImgG->src;
                            $adsImg[$i]['img_thumb'] = $oneImgG->src;
                            $adsImg[$i]['user_id'] = $model->user_id;
                        }
                        $i++;
                    }
                }

                foreach ($adsImg as $item) {
                    $imgAds = new AdsImg();
                    $imgAds->user_id = $item['user_id'];
                    $imgAds->img = $item['img'];
                    $imgAds->img_thumb = $item['img_thumb'];
                    $imgAds->ads_id = $item['ads_id'];
                    $imgAds->save();
                }

                //Debug::prn($adsImg);

                // echo $domOne;
                //break;
                sleep(20);
            }
        }

    }
}