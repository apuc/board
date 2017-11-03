<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 03.11.17
 * Time: 17:35
 */

namespace frontend\modules\adsmanager\models;

use yii\filters\RateLimitInterface;

class UrlRateLimiter extends Ads implements RateLimitInterface
{
    public $rateLimit = 3;
    public $allowance;
    public $allowance_updated_at;

    /**
     * Кол-во разрешенных запросов в секунду
     *
     * @param \yii\web\Request $request
     * @param \yii\base\Action $action
     * @return array
     */
    public function getRateLimit($request, $action)
    {
        // rateLimit - кол-во
        // 10 - это секунды
        return [$this->rateLimit, 1];
    }

    public function loadAllowance($request, $action)
    {
        $cache = \Yii::$app->cache;
        $key = sha1(serialize($request->url));
        return [
            $cache->get('user.ratelimit.ip.allowance.' . $key),
            $cache->get('user.ratelimit.ip.allowance_updated_at.' . $key),
        ];
    }

    /**
     * Метод сохранит в кеш
     * @param \yii\web\Request $request
     * @param \yii\base\Action $action
     * @param int $allowance
     * @param int $timestamp
     */
    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $cache = \Yii::$app->cache;
        $key = sha1(serialize($request->url));

        $cache->set('user.ratelimit.ip.allowance.' . $key, $allowance);
        $cache->set('user.ratelimit.ip.allowance_updated_at.' . $key, $timestamp);

    }
}