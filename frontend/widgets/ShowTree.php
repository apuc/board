<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.01.2017
 * Time: 12:08
 */

namespace frontend\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowTree extends Widget
{

    public $parent_field = 'parent_id';
    public $start_point = 0;
    public $wrap = '<div>{tree}</div>';
    public $tpl = '<ul class="tpl_class">{items}</ul>';
    public $item_tpl = '<li class="item_class">{item}</li>';
    public $item_tpl_last = false;
    public $item = '<a href="{slug}">{name}</a>';
    public $item_last = false;
    public $model = false;
    public $data = false;
    public $tpl_first;
    public $tpl_second;
    public $item_first;
    public $item_second;
    public $item_last_first;
    public $item_last_second;
    public $wrap_first;
    public $wrap_second;

    public function run()
    {
        $this->template_processing();
        echo $this->wrap_first;
        echo $this->get_tree($this->model,0);
        echo $this->wrap_second;
    }

    public function get_child($model,$parent_id){
        $arr = [];
        foreach ($model as $item){
            if($item[$this->parent_field] == $parent_id){
                $arr[] = $item;
            }
        }
        if(!empty($arr)){
            return $arr;
        }
        return false;
    }

    public function has_child($model, $parent_id){
        $count = $model->find()->where([$this->parent_field => $parent_id])->count();
        return ($count > 0) ? true : false;
    }

    public function template_processing(){
        $tpl = explode('{items}',$this->tpl);
        $this->tpl_first = $tpl[0];
        $this->tpl_second = $tpl[1];

        $item = explode('{item}',$this->item_tpl);
        $this->item_first = $item[0];
        $this->item_second = $item[1];

        if($this->item_tpl_last){
            $item_last = explode('{item}',$this->item_tpl_last);
            $this->item_last_first = $item_last[0];
            $this->item_last_second = $item_last[1];
        }


        $wrap = explode('{tree}',$this->wrap);
        $this->wrap_first = $wrap[0];
        $this->wrap_second = $wrap[1];
    }

    public function get_tree($model,$point){
        $res = '';
        $res .= $this->tpl_first;
        $items = $model->find()->where([$this->parent_field => $point])->all();
        foreach ($items as $item){

            if($this->has_child($model,$item->id)){
                $res .= $this->item_first;
                $res .= $this->get_item($item);
                $res .= $this->get_tree($model,$item->id);
                $res .= $this->item_second;
            }
            else {
                $res .= ($this->item_tpl_last) ? $this->item_last_first : $this->item_first;
                $res .= $this->get_item($item, true);
                $res .= ($this->item_tpl_last) ? $this->item_last_second : $this->item_second;
            }

        }
        $res .= $this->tpl_second;
        return $res;
    }

    public function get_item($item, $last = false){
        if($last){
            $str = ($this->item_last) ? $this->item_last : $this->item;
        }
        else {
            $str = $this->item;
        }
        foreach ($item as $k => $v){
            $key = "{".$k."}";
            $str = preg_replace("/$key/", $v, $str);
        }
        return $str;
    }

}