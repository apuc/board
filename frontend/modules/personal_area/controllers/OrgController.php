<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 22.02.2017
 * Time: 22:45
 */

namespace frontend\modules\personal_area\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class OrgController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }



}