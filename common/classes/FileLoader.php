<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 20.01.2017
 * Time: 10:52
 */

namespace common\classes;


use yii\web\UploadedFile;

class FileLoader
{

    public static function load($model,$path,$file_name = false){
        $name = $model->formName();
        if(isset($_FILES[$name]['name'])){
            if(is_array($_FILES[$name]['name'])){
                $arr = [];
                foreach ($_FILES[$name]['name'] as $k=>$v){
                    if(!empty($v)){
                        $file = new UploadedFile();
                        $file->name = $_FILES[$name]['name'][$k];
                        $file->tempName = $_FILES[$name]['tmp_name'][$k];
                        $file->type = $_FILES[$name]['type'][$k];
                        $file->size = $_FILES[$name]['size'][$k];
                        $file->error = $_FILES[$name]['error'][$k];
                        $file_name_item = (isset($file_name[$k])) ? $file_name[$k] : $file->getBaseName();
                        $file->saveAs($path . $file_name_item . '.' . $file->getExtension());
                        $arr[$k] = $path . $file_name_item . '.' . $file->getExtension();
                    }
                }
                return $arr;
            }
            else {
                $file_name = ($file_name) ? $_FILES[$name]['name'] : $file_name;
                $file = new UploadedFile();
                $file->name = $_FILES[$name]['name'];
                $file->tempName = $_FILES[$name]['tmp_name'];
                $file->type = $_FILES[$name]['type'];
                $file->size = $_FILES[$name]['size'];
                $file->error = $_FILES[$name]['error'];
                $file->saveAs($path . $file_name . '.' . $file->getExtension());
                return $path . $file_name . '.' . $file->getExtension();
            }

        }
        //Debug::prn($model->formName());
    }

}