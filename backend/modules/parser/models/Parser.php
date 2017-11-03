<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 19.10.17
 * Time: 10:58
 */

namespace backend\modules\parser\models;

class Parser
{
    public function curlGet($url, $referer = "http://google.com")
    {
        $curlInit = curl_init();
        curl_setopt($curlInit, CURLOPT_URL, $url);
        curl_setopt($curlInit, CURLOPT_HEADER, false);
        curl_setopt ($curlInit , CURLOPT_USERAGENT , "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36");
        curl_setopt ($curlInit , CURLOPT_REFERER , $referer);
        curl_setopt ($curlInit , CURLOPT_RETURNTRANSFER , true);

        $data = curl_exec($curlInit);
        curl_close($curlInit);
        return $data;
    }
}