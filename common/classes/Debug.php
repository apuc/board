<?php

namespace common\classes;

use yii\base\Component;

class Debug
{
    public static function prn($content)
    {
        echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px; text-align: left">';
        print_r($content);
        echo '</pre>';
    }
}