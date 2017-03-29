<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 */

$this->title = Yii::t('user', 'Networks');
$this->params['breadcrumbs'][] = $this->title;
echo \frontend\modules\personal_area\widgets\MenuPersonalArea::widget();
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<section class="kabinet-setting-account">
    <div class="container">

        <?= $this->render('_menu') ?>

        <div class="kabinet-setting-account__right">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumbs__list']
                ]) ?>
            </article>
            <!-- close .breadcrubs -->
            <h2>Подключить соцсети</h2>
            <p><?= Yii::t('user', 'You can connect multiple accounts to be able to log in using them') ?>.</p>

            <?php $auth = Connect::begin([
                'baseAuthUrl' => ['/user/security/auth'],
                'accounts'    => $user->accounts,
                'autoRender'  => false,
                'popupMode'   => false,
            ]) ?>

                <?php foreach ($auth->getClients() as $client): ?>
                        <div class="row-soc">
                            <?= Html::tag('span', '', ['class' => 'auth-icon ' . $client->getName()]) ?>
                            <strong><?= $client->getTitle() ?></strong>
                            <?= $auth->isConnected($client) ?
                                Html::a(Yii::t('user', 'Disconnect'), $auth->createClientUrl($client), [

                                    'data-method' => 'post',
                                ]) :
                                Html::a(Yii::t('user', 'Connect'), $auth->createClientUrl($client), [

                                ])
                            ?>
                        </div>

                <?php endforeach; ?>

            <?php Connect::end() ?>
        </div>
    </div>
</section>
