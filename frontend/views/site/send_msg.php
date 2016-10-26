<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 17:26
 * @var $req
 */
?>
<h3>Сообщение отправленно</h3>
<br>
<a href="<?= \yii\helpers\Url::to(['/personal_area/msg/messages', 'user_id'=>$req->post('to')]) ?>">Перейти в диалог</a>
