<?php
use yii\helpers\Url;
?>

<!--<ul class="kabinet-favorite-right_top-menu">
    <li class="active"><a href="<?/*= Url::to(['/personal_area/favorites/ads_favorites'])*/?>" >Объявления</a></li>
    <li><a href="<?/*= Url::to(['/personal_area/favorites/org_favorites'])*/?>">Организации</a></li>
    <!--<li><a href="">Спецпредложения</a></li>
</ul>-->


<?php
//\common\classes\Debug::prn(Yii::$app->controller->action->id);
echo \yii\widgets\Menu::widget(
    [
        'items' => [
            [
                'label' => 'Объявления',
                'url' => Url::to(['/personal_area/favorites/ads_favorites']),
                //'template' => '<a href="{url}">{label}</a>',
                'active' => Yii::$app->controller->action->id == 'ads_favorites',

            ],
            [
                'label' => 'Организации',
                'url' => Url::to(['/personal_area/favorites/org_favorites']),
                //'template' => '<a href="{url}"><span class="shops-favorite"></span>{label}</a>',
                'active' => Yii::$app->controller->action->id == 'org_favorites',
            ],

        ],
        'activateItems' => true,
        'activateParents' => true,
        'activeCssClass' => 'active',
        'encodeLabels' => false,
        /*'dropDownCaret' => false,*/
        /*'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",*/
        'options' => [
            'class' => 'kabinet-favorite-right_top-menu',
        ]
    ]
);
