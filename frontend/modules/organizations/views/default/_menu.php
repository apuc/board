<?php
use yii\helpers\Url;
?>

<!--<section class="shops-header__menu">
    <div class="container">
        <ul class="shops-header__mnu">
            <li class="active">
                <a href="">
                    <span class="shops-ad-icon icon"></span>
                    Объявления
                </a>
            </li>
            <li>
                <a href="">
            <span class="about-company icon ">
            </span>О компании
                </a>
            </li>
            <li>
                <a href="">
                    <span class="comments-icon_shop icon"></span>
                    Отзывы</a>
            </li>
            <li>
                <a href="">
                    <span class="jobs-icon_shop icon"></span> Вакансии
                </a>
            </li>
            <li>
                <a href="">
            <span class="special-offer icon">

            </span>
                    Спецпредложения</a>
            </li>
        </ul>
    </div>
</section>-->

    <section class="shops-header__menu">
        <div class="container">
<?php
//\common\classes\Debug::prn(Yii::$app->controller->action->id);
echo \yii\widgets\Menu::widget(
    [
        'items' => [
            [
                'label' => 'Объявления',
                'url' => Url::to(['/organizations/default/view', 'slug' => $slug]),
                'template' => '<a href="{url}"><span class="shops-ad-icon icon"></span>{label}</a>',
                'active' => Yii::$app->controller->action->id == 'view',

            ],
            [
                'label' => 'О компании',
                'url' => Url::to(['/organizations/default/about', 'slug' => $slug]),
                'template' => '<a href="{url}"><span class="about-company icon"></span>{label}</a>',
                'active' => Yii::$app->controller->action->id == 'about',
            ],
            /*[
                'label' => 'Отзывы',
                'url' => '#',
                'template' => '<a href="{url}"><span class="comments-icon_shop icon"></span>{label}</a>',
                'active' => Yii::$app->controller->module->id == 'status',

            ],
            [
                'label' => 'Вакансии',
                'url' => Url::to(['/personal_area/msg/messages']),
                'template' => '<a href="{url}"><span class="jobs-icon_shop icon"></span>{label}</a>',
                'active' => Yii::$app->controller->id == 'msg',

            ],
            [
                'label' => 'Спецпредложения',
                'url' => '#',
                'template' => '<a href="#"><span class="special-offer icon"></span>{label}</a>',
                'active' => Yii::$app->controller->module->id == 'status',
            ],*/
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
?></div>
    </section>