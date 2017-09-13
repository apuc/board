<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 11.09.17
 * Time: 16:22
 */

namespace common\classes;

use common\models\db\SiteAccessApi;

class ApiFunction
{
    public static function getApiKey($apiKey)
    {
        if (!isset($apiKey) || empty($apiKey)) {
            return 'not key';
            //Debug::prn(123);
            //throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        } else {

            $site = SiteAccessApi::find()->where(['api_key' => $apiKey])->one();
            if (empty($site)) {
                return 'key not';
            } else {
                return $site;
            }
        }
    }
}