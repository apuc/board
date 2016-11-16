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
                    'template' => '<a href="{url}"><span class="kabinet-header-icon-mail "></span>{label}</a>',
                    'active' => Yii::$app->controller->id == 'ads',

                ],
                [
                    'label' => 'Избранное',
                    'url' => Url::to(['/personal_area/favorites/ads_favorites']),
                    'template' => '<a href="{url}"><span class="kabinet-header-icon-favorite "></span>{label}</a>',
                    'active' => Yii::$app->controller->id == 'favorites',
                ],
                [
                    'label' => 'Мои организации',
                    'url' => '#',
                    'template' => '<a href="{url}"><span class="kabinet-header-icon-delivery "></span>{label}</a>',
                    'active' => Yii::$app->controller->module->id == 'status',

                ],
                [
                    'label' => 'Сообщения',
                    'url' => Url::to(['/personal_area/msg/messages']),
                    'template' => '<a href="{url}"><span class="kabinet-header-icon-msg "></span>{label}</a>',
                    'active' => Yii::$app->controller->id == 'msg',

                ],
                [
                    'label' => 'Счет',
                    'url' => '#',
                    'template' => '<a href="#"><span class="kabinet-header-icon-bill "></span>{label}</a>',
                    'active' => Yii::$app->controller->module->id == 'status',
                ],
                [
                    'label' => 'Настройки',
                    'url' => Url::to(['/user/settings/profile']),
                    'template' => '<a href="{url}"><span class="kabinet-header-icon-setting "></span>{label}</a>',
                    'active' => Yii::$app->controller->id == 'settings',
                ],
            ],
            'activateItems' => true,
            'activateParents' => true,
            'activeCssClass' => 'active',
            'encodeLabels' => false,
            /*'dropDownCaret' => false,*/
            /*'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",*/
            'options' => [
                'class' => 'kabinet-header__mnu',
            ]
        ]
    );
        ?>


    </div>
</section>
