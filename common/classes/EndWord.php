<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 19.09.2016
 * Time: 23:58
 */

namespace common\classes;


class EndWord
{
    public static function num2word($num, $words)
    {
        $num = $num % 100;

        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1: {
                return($words[0]);
            }
            case 2: case 3: case 4: {
            return($words[1]);
        }
            default: {
                return($words[2]);
            }
        }
    }
}