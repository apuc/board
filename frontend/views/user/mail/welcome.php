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

/**
 * @var dektrium\user\Module 		$module
 * @var dektrium\user\models\User   $user
 * @var dektrium\user\models\Token  $token
 * @var bool                        $showPassword
 */

?>
<!--<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Yii::t('user', 'Hello') */?>,
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Yii::t('user', 'Your account on {0} has been created', Yii::$app->name) */?>.
    <?php /*if ($showPassword || $module->enableGeneratingPassword): */?>
        <?/*= Yii::t('user', 'We have generated a password for you') */?>: <strong><?/*= $user->password */?></strong>
    <?php /*endif */?>

</p>

<?php /*if ($token !== null): */?>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Yii::t('user', 'In order to complete your registration, please click the link below') */?>.
</p>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Html::a(Html::encode($token->url), $token->url); */?>
</p>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Yii::t('user', 'If you cannot click the link, please try pasting the text into your browser') */?>.
    <?php /*endif */?>
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?/*= Yii::t('user', 'If you did not make this request you can ignore this email') */?>.
</p>-->

<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" data-editable="text">
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #ffffff;">
            <?= Yii::t('user', 'Hello'); ?>, <?= $user->username; ?><br />
            <?= Yii::t('user', 'Your account on {0} has been created', Yii::$app->name) ?>
            <?php if ($module->enableGeneratingPassword && $token !== null): ?>
                <?= Yii::t('user', 'We have generated a password for you') ?>:
                <strong><?= $user->password ?></strong>
            <?php endif ?><br />
            <?php if ($token !== null): ?>
                <?= Yii::t('user', 'In order to complete your registration, please click the link below') ?>.<br />

            <?php endif ?>
        </td>
    </tr>
    <?php if ($token !== null): ?>
    <tr>
        <td align="left" valign="top" style="padding: 10px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); border: 0px none transparent;"><br>
            <span style="font-family:Arial,Helvetica,sans-serif;color:#363636;font-size:14px"></span>
            <div data-box="button" style="width: 100%; margin-top: 0px; margin-bottom: 0px; text-align: center;">
                <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="button" style="padding-bottom: 0px; padding-top: 0px; margin: 0px auto;">
                    <tbody>
                    <tr>
                        <td valign="top" align="center" class="tdBlock" style="display: inline-block; padding: 7px 25px; margin: 0px; border-radius: 18px; background-color: rgb(255, 246, 196);">
                            <a href="<?= $token->url?>" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #363636; font-size: 18px; text-decoration: none; font-weight: bold;" target="_blank">Активировать аккаунт</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #ffffff;">
            <?= Yii::t('user', 'If you did not make this request you can ignore this email') ?>.
        </td>
    </tr>
    </tbody>
</table>
