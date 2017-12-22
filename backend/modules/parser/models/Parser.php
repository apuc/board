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
    public function curlGet($url, $referer = "http://google.com.ua")
    {
     $curlInit = curl_init();
        curl_setopt($curlInit, CURLOPT_URL, $url);
        curl_setopt($curlInit, CURLOPT_HEADER, false);
        curl_setopt ($curlInit , CURLOPT_USERAGENT , "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36");
        /*curl_setopt ($curlInit, CURLOPT_PROXY, "77.93.33.212:1080");
        curl_setopt ($curlInit, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);*/
        curl_setopt ($curlInit , CURLOPT_REFERER , $referer);
        curl_setopt ($curlInit , CURLOPT_RETURNTRANSFER , true);
        $data = curl_exec($curlInit);
        curl_close($curlInit);
        return $data;
    }

    public static function save_image($img,$path){
        $curl = curl_init($img);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER,1);
        $content = curl_exec($curl);
        curl_close($curl);
        if (file_exists($path)) :
            unlink($path);
        endif;
        $fp = fopen($path,'x');
        fwrite($fp, $content);
        fclose($fp);
    }

    public static function saveImage($img,$path){
        $ch = curl_init($img);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $out = curl_exec($ch);
        $image_sv = $path;
        $img_sc = file_put_contents($image_sv, $out);
        curl_close($ch);
    }

}