<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.03.2018
 * Time: 23:40
 */

namespace common\models;

use common\classes\Debug;

class Search
{

    public static function check($link, $searchSystem = null)
    {

        $sc = new self();
        if ($searchSystem === 'ya') {
            return $sc->checkYa($link);
        }
        if ($searchSystem === 'google') {
            return $sc->checkYa($link);
        }
        if ($searchSystem === null) {
            return [
                'ya' => $sc->checkYa($link),
                'google' => $sc->checkGoogle($link),
            ];
        }
        return false;

    }

    public function checkYa($link)
    {
        $res = $this->parse('https://yandex.ru/search/', [
            'text' => 'url:' . $link,
        ]);

        $document = \phpQuery::newDocument($res);
        $count = $document->find('.serp-adv__found')->count();
        return $count === 1;
    }

    public function checkGoogle($link)
    {
        $res = $this->parse('https://www.google.ru/search', [
            'q' => 'site:' . $link,
        ]);

        $document = \phpQuery::newDocument($res);
        $count = $document->find('#resultStats')->count();
        return $count === 1;
    }

    public function parse($link, array $data = array())
    {
        $url = $link;
        if (!empty($data)) {
            $url .= '?';
            $dataStr = '';
            foreach ($data as $key => $datum) {
                $dataStr .= $key . '=' . $datum . '&';
            }
            $url .= substr($dataStr, 0, -1);
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        return curl_exec($curl);
    }

}