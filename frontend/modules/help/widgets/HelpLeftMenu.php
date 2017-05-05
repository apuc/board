<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 12:43
 */

namespace frontend\modules\help\widgets;


use common\classes\Debug;
use common\models\db\CategoryHelp;
use common\models\db\Help;
use yii\base\Widget;
use yii\helpers\Url;

class HelpLeftMenu extends Widget
{

    public $category_id;

    public function run()
    {
        $category = CategoryHelp::find()->all();
        $c = [];

        foreach($category as $item){
            $c[$item->id]['id'] = $item->id;
            $c[$item->id]['name'] = $item->name;
            $c[$item->id]['parent_id'] = $item->parent_id;
        }

        //Debug::prn($this->get_child($c,4));

        return $this->render('left_menu', [
            'category' => $c,
            'category_id' => $this->category_id
        ]);
    }

    public function get_child($category,$parent_id){
        $arr = [];
        foreach($category as $item){
            if($item['parent_id'] == $parent_id){
                $arr[$item['id']] = $item;
            }
        }
        return $arr;
    }

    public function get_tree($category, $id){
        $arr_parent = $this->get_all_parent($category,$this->category_id,[]);
        $arr = $this->get_child($category,$id);
        echo "<ul>";
        foreach($arr as $item){
            $open = (in_array($item['id'],$arr_parent)) ? 'open' : '';
            //$class = ($this->get_child($category,$item['id']) === []) ? 'active' : 'has-sub';
            echo "<li class='has-sub $open'>";
            echo "<a href='" . Url::to(['/help/default/category', 'id'=>$item['id']]) . "' ><span>". $item['name'] ."</span></a>";
            if(!empty($this->get_child($category,$item['id']))){
                $this->get_tree($category,$item['id']);
            }
            else {
                $this->get_help($item['id']);
            }
            echo "</li>";
        }
        echo "</ul>";
    }

    public function get_help($category_id){
        $help = Help::find()->where(['category_id'=>$category_id])->all();
        echo "<ul>";
        foreach($help as $item){
            $class = '';
            if($item['slug'] == \Yii::$app->request->get('slug') ){
                $class = 'active';
            }
            echo "<li class='$class'>";
            echo "<a href='" . Url::to(['/help/default/view', 'slug'=>$item['slug']]) . "' ><span>". $item['title'] ."</span></a>";
            echo "</li>";
        }
        echo "</ul>";
    }

    public function get_all_parent($category, $id, $arr){
        $arr[] = $id;
        if($id != 0){
            if($category[$id]['parent_id'] != 0){
                $arr = $this->get_all_parent($category,$category[$id]['parent_id'],$arr);
            }
        }
        return $arr;
    }
}