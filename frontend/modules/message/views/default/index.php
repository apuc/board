<?php
/**
 * @var $interlocutors \common\models\db\User
 */

use common\models\db\Msg;

$this->registerJsFile('/js/messages.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Мои сообщения';
$this->params['breadcrumbs'][] = $this->title;
//\common\classes\Debug::prn($interlocutors);
?>
<?/*= $this->render('../ads/_menu')*/?>
<section class="kabinet-favorite">
    <div class="container">
        <div class="kabinet-favorite-left">
            <ul id="interlocutorBox">
                <?php foreach ($interlocutors as $interlocutor): ?>
                    <?php $count = Msg::getCountUnreadFromInterlocutorS($interlocutor->id); ?>
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
            </ul>
        </div>
        <div class="kabinet-favorite-right">

            <div class="kabinet-msg-box">

                <div class="kabinet-msg-wrapper" id="msgBox">

                    <div class="kabinet-msg-box__question">
                        <a href="#">
                            <img src="img/sender-avatar.png" alt="avatar">
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto commodi
                            consequuntur cum, doloribus eveniet explicabo magnam minus mollitia neque nobis nostrum
                            officiis
                            omnis pariatur quia quidem soluta totam veniam.
                            <span class="kabinet-msg-box__date">SENT 11:20 AM   SEEN 11:25AM</span>

                        </p>

                    </div>

                    <div class="kabinet-msg-box__answer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto commodi
                            consequuntur cum, doloribus eveniet explicabo magnam minus mollitia neque nobis nostrum
                            officiis
                            omnis pariatur quia quidem soluta totam veniam.
                            <span class="kabinet-msg-box__date">SENT 11:20 AM   SEEN 11:25AM</span>
                        </p>

                        <a href="#">
                            <img src="img/sender-avatar-2.png" alt="avatar">
                        </a>
                    </div>

                    <div class="kabinet-msg-box__answer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto commodi
                            consequuntur cum, doloribus eveniet explicabo magnam minus mollitia neque nobis nostrum
                            officiis
                            omnis pariatur quia quidem soluta totam veniam.
                            <span class="kabinet-msg-box__date">SENT 11:20 AM   SEEN 11:25AM</span>
                        </p>

                        <a href="#">
                            <img src="img/sender-avatar-2.png" alt="avatar">
                        </a>
                    </div>

                    <div class="kabinet-msg-box__answer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto commodi
                            consequuntur cum, doloribus eveniet explicabo magnam minus mollitia neque nobis nostrum
                            officiis
                            omnis pariatur quia quidem soluta totam veniam.
                            <span class="kabinet-msg-box__date">SENT 11:20 AM   SEEN 11:25AM</span>
                        </p>

                        <a href="#">
                            <img src="img/sender-avatar-2.png" alt="avatar">
                        </a>
                    </div>

                    <div class="kabinet-msg-box__question">
                        <a href="#">
                            <img src="img/sender-avatar.png" alt="avatar">
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto commodi
                            consequuntur cum, doloribus eveniet explicabo magnam minus mollitia neque nobis nostrum
                            officiis
                            omnis pariatur quia quidem soluta totam veniam.
                            <span class="kabinet-msg-box__date">SENT 11:20 AM   SEEN 11:25AM</span>

                        </p>

                    </div>

                </div>

                <form action="" class="kabinet-msg-form">

                    <textarea name="" id="" cols="30" rows="10" placeholder="Введите Ваше сообщение"></textarea>
                    <input type="submit" class="kabinet-msg-form__submit" value="Отправить">

                </form>

            </div>

        </div>
    </div>
</section>
