<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.03.2017
 * Time: 0:28
 * @var $dialog array
 */
?>

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