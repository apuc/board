<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.09.2016
 * Time: 16:22
 */
use yii\helpers\Url; ?>

<section class="kabinet-header__menu">
    <div class="container">
        <!--<ul class="kabinet-header__mnu">
            <li><a href=""><span class="kabinet-header-icon-mail "></span>Объявления</a></li>
            <li><a href=""><span class="kabinet-header-icon-favorite "></span>Избранные</a></li>
            <li><a href=""><span class="kabinet-header-icon-delivery "></span>Мои магазины</a></li>
            <li><a href=""><span class="kabinet-header-icon-msg "></span>Сообщения</a></li>
            <li><a href=""><span class="kabinet-header-icon-bill "></span>Счет</a></li>
            <li><a href=""><span class="kabinet-header-icon-setting "></span>Настройки</a></li>
        </ul>-->

        <?php
        //\common\classes\Debug::prn(Yii::$app->controller->id);
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Объявления',
                        'url' => Url::to(['/personal_area/ads/ads_user_active']),
                        'template' => '<a href="{url}"><span class="shops-ad"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'ads',

                    ],
                    [
                        'label' => 'Избранное',
                        'url' => Url::to(['/personal_area/favorites/ads_favorites']),
                        'template' => '<a href="{url}"><span class="shops-favorite"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'favorites',
                    ],
                    [
                        'label' => 'Мои организации',
                        'url' => Url::to(['/personal_area/org/org_user_active']),
                        'template' => '<a href="{url}"><span class="shops-my"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'org',

                    ],
                    [
                        'label' => 'Сообщения',
                        'url' => Url::to(['/message/default']),
                        'template' => '<a href="{url}"><span class="shops-msg"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'message',

                    ],
                    [
                        'label' => 'Счет',
                        'url' => Url::to(['/personal_area/score/index']),
                        'template' => '<a href="{url}"><span class="shops-wallet"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'score',
                    ],
                    [
                        'label' => 'Интеграции',
                        'url' => Url::to(['/personal_area/integration/vk']),
                        'template' => '<a href="{url}"><span class="shops-wallet"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'integration',
                    ],
                    [
                        'label' => 'Настройки',
                        'url' => Url::to(['/user/settings/profile']),
                        'template' => '<a href="{url}"><span class="shops-setting"></span><span class="shops-txt">{label}</span></a>',
                        'active' => Yii::$app->controller->id === 'settings',
                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass' => 'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                /*'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",*/
                'options' => [
                    'class' => 'shops-header__mnu',
                ]
            ]
        );
        ?>


    </div>
</section>
