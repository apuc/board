<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 28.12.2017
 * Time: 16:46
 * @var $slug string
 * @var $model \common\models\db\Ads
 */

use yii\helpers\Html;
$vkUrl = \yii\helpers\Url::to(['send', 'slug' =>$slug]);
$twUrl = \yii\helpers\Url::to(['send-tw', 'slug'=>$slug]);
echo Html::a('vk', 'javascript: new_window("'.$vkUrl.'")');
echo $model->post_vk === 1 ? ' (Есть)' : ' (Нет)';
echo '</br>';
echo Html::a('tw', 'javascript: new_window("'.$twUrl.'")');
echo $model->post_tw === 1 ? ' (Есть)' : ' (Нет)';


?>
<SCRIPT LANGUAGE="JavaScript">
    <!--
    var newWin;
    function new_window(link)
    {
        newWin = window.open(link,'newwin','top=15, left=20, menubar=0, toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, width=400, height=400');
        newWin.onload = function () {
            newWin.document.write("Публикация...");
            newWin.close();
        }
    }
    // -->
</SCRIPT>
