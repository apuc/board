<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h3>Для подтверждения изминения почтового адреса в сервисе RUB-ON перейдите по ссылке ниже: </h3>
<?= Html::a('Ссылка',Url::to(['user/settings/confirm', 'id' => $userId, 'code' => $code],true));
