<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 14.01.2017
 * Time: 11:28
 */

namespace frontend\modules\organizations\models;


use yii\db\ActiveRecord;

class Organizations extends \common\models\db\Organizations
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'region_id' => [
                'class' => 'common\behaviors\SaveRegionId',
                'in_attribute' => 'city_id',
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'logo' => 'Логотип',
            'header' => 'Обложка',
            'slug' => 'Slug',
            'descr' => 'Описание',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
            'views' => 'Views',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'user_id' => 'User ID',
            'mail' => 'E-Mail',
            'phone' => 'Телефон',
            'site' => 'Сайт',
            'schedule' => 'Режим работы',
            'vip' => 'Vip',
            'category_id' => 'Категория',
            'address' => 'Адрес',
            'link_vk' => 'Ссылка Vk',
            'link_google' => 'Ссылка Google',
            'link_fb' => 'Ссылка Fb',
            'link_tw' => 'Ссылка Tw',
        ];
    }
}