<?php
/**
 * @var $interlocutors \common\models\db\User
 * @var $to integer
 * @var $dialog array
 */

use common\models\db\Msg;

$this->registerJsFile('/js/messages.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Диалог';
$this->params['breadcrumbs'][] = $this->title;
//\common\classes\Debug::prn($dialog);
?>
<?= \frontend\modules\personal_area\widgets\MenuPersonalArea::widget() ?>
<section class="kabinet-favorite">
    <div class="container">
        <div class="kabinet-favorite-left">
            <ul id="interlocutorBox">
                <?php foreach ($interlocutors as $interlocutor): ?>
                    <?php $count = Msg::getCountUnreadFromInterlocutorS($interlocutor->id, Yii::$app->user->id); ?>
                    <li>
                        <a href="<?= \yii\helpers\Url::to([
                            '/message/default/dialog',
                            'username' => $interlocutor->username,
                        ]) ?>">
                        <span class="kabinet-sender-avatar">
                            <img src="<?= !empty($interlocutor->profile->avatar_little) ? $interlocutor->profile->avatar_little : '/img/default_avatar_male.jpg'; ?>"
                                 alt="Avatar">
                        </span>
                            <span class="kabinet-sender-name">
                                <?= !empty($interlocutor->profile->name) ? $interlocutor->profile->name : $interlocutor->username; ?>
                                <?= $count != 0 ? '('.$count.')' : '' ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="kabinet-favorite-right">

            <div class="kabinet-msg-box">

                <div class="kabinet-msg-wrapper" id="msgBox">

                    <?php foreach ($dialog as $item): ?>
                        <div class="<?= $item['type'] === 'my_msg' ? 'kabinet-msg-box__question' : 'kabinet-msg-box__answer' ?>">
                            <?php if ($item['type'] === 'my_msg'): ?>
                                <a href="#">
                                    <img src="<?= !empty($item['avatar']) ? $item['avatar'] : '/img/default_avatar_male.jpg' ?>"
                                         alt="avatar">
                                </a>
                            <?php endif; ?>
                            <p><?= $item['message'] ?>
                                <span class="kabinet-msg-box__date">
                                    <?= $item['authorLogin'] ?> <?= date('Y-m-d H:i', $item['dt_add']) ?>
                                </span>

                            </p>
                            <?php if ($item['type'] === 'interlocutor_msg'): ?>
                                <a href="#">
                                    <img src="<?= !empty($item['avatar']) ? $item['avatar'] : '/img/default_avatar_male.jpg' ?>"
                                         alt="avatar">
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                </div>
                <form action="" class="kabinet-msg-form">

                    <textarea id="textMsg" name=""  cols="30" rows="10" placeholder="Введите Ваше сообщение"></textarea>
                    <input type="submit" data-from="<?= Yii::$app->user->id ?>" data-to="<?= $to ?>" class="kabinet-msg-form__submit" id="sendMsg" value="Отправить">

                </form>

            </div>

        </div>
    </div>
</section>