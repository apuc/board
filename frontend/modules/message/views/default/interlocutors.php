<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.03.2017
 * Time: 14:42
 * @var $interlocutors \common\models\db\User
 */
use common\models\db\Msg;

?>

<?php foreach ($interlocutors as $interlocutor): ?>
    <?php $count = Msg::getCountUnreadFromInterlocutorS($interlocutor->id, Yii::$app->user->id); ?>
    <li>
        <a href="<?= \yii\helpers\Url::to(['/message/default/dialog','username'=>$interlocutor->username]) ?>">
                        <span class="kabinet-sender-avatar">
                            <img src="<?= !empty($interlocutor->profile->avatar_little) ? $interlocutor->profile->avatar_little : '/img/default_avatar_male.jpg'; ?>" alt="Avatar">
                        </span>
            <span class="kabinet-sender-name">
                                <?= !empty($interlocutor->profile->name) ? $interlocutor->profile->name : $interlocutor->username; ?>
                                <?= $count != 0 ? '('.$count.')' : '' ?>
                            </span>
        </a>
    </li>
<?php endforeach; ?>
