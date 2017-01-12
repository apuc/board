<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\Menu;

/** @var dektrium\user\models\User $user */
$user = Yii::$app->user->identity;
$networksVisible = count(Yii::$app->authClientCollection->clients) > 0;

?>



<div class="kabinet-setting-account__left">
    <ul>
        <li><a href="<?= \yii\helpers\Url::to(['/user/settings/profile'])?>">Профиль</a></li>
        <li><a href="<?= \yii\helpers\Url::to(['/user/settings/account'])?>">Аккаунт</a></li>
        <li><a href="<?= \yii\helpers\Url::to(['/user/settings/networks'])?>">Соцсети</a></li>
    </ul>
</div>
