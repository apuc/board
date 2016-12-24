<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.12.2016
 * Time: 14:40
 */

namespace common\models;


use yii\base\ModelEvent;
use yii\web\UploadedFile;

class UploadFile extends ModelEvent
{

    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }

}