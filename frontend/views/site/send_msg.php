<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 17:26
 * @var $req
 */
use common\classes\UserFunction;
use yii\helpers\Url;

?>
<h3>Сообщение отправленно</h3>
<br>
<a href="<?= Url::to(['/message/default/dialog', 'username'=> UserFunction::getUserLoginById($req->post('to'))]) ?>">
    Перейти в диалог
</a>
