<?php

namespace frontend\modules\adsmanager;
use yii\helpers\Url;

/**
 * adsmanager module definition class
 */
class Adsmanager extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\adsmanager\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
