<?php

$this->title = "Регистрация";
use yii\helpers\Html;

/**
 * @var $link
 */

?>
<section class="before-active">
    <div class="container"><img src="/theme/images/mails/activateaccount.svg" alt="" role="presentation"/>
        <div class="before-active__text">
            <h2>Теперь вы должны<strong> активировать свой аккаунт</strong>
            </h2>
            <p class="before-active__two"><strong>Перейдите по ссылке,</strong> которую мы вам только что выслали.
            </p>
            <p class="before-active__three">Если<strong> не найдете письмо</strong> в почте,<strong> проверьте Спам.</strong>
            </p>
            <div class="before-active__btns">
                <a class="button button button_red" href="http://www.<?=$link; ?>">Проверить e-mail</a>
                <a class="before-active__btn-right" href="<?= \yii\helpers\Url::toRoute('/resend'); ?>">Отправить еще раз
                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve" width="512px" height="512px">
                <g>
                    <path class="active-path" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111                    C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587                    c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z" data-original="#1E201D" data-old_color="#4d8eff" fill="#4d8eff"></path>
                </g>
              </svg></a>
            </div>
        </div>
    </div>
</section>
