<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property string $header
 * @property string $slug
 * @property string $descr
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $status
 * @property integer $views
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $user_id
 * @property string $mail
 * @property string $phone
 * @property string $site
 * @property string $schedule
 * @property integer $vip
 * @property integer $category_id
 * @property string $address
 * @property string $link_vk
 * @property string $link_google
 * @property string $link_fb
 * @property string $link_tw
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'descr', 'user_id', 'category_id','mail'], 'required'],
            [['descr'], 'string'],
            [['dt_add', 'dt_update', 'status', 'views', 'region_id', 'city_id', 'user_id', 'vip', 'category_id'], 'integer'],
            [['title', 'logo', 'header', 'slug', 'mail', 'phone', 'site', 'schedule', 'address', 'link_vk', 'link_google', 'link_fb', 'link_tw'], 'string', 'max' => 255],
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
            'logo' => 'Logo',
            'header' => 'Header',
            'slug' => 'Slug',
            'descr' => 'Описание',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
            'views' => 'Views',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'user_id' => 'Пользователь',
            'mail' => 'Почта',
            'phone' => 'Телефон',
            'site' => 'Сайт',
            'schedule' => 'Schedule',
            'vip' => 'Вип',
            'category_id' => 'Категория',
            'address' => 'Адресс',
            'link_vk' => 'Link Vk',
            'link_google' => 'Link Google',
            'link_fb' => 'Link Fb',
            'link_tw' => 'Link Tw',
        ];
    }

    public function getCategory()
    {
       return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    public function getCity()
    {
        return $this->hasOne(GeobaseCity::className(),['id'=>'city_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(GeobaseRegion::className(),['id'=>'region_id']);
    }
}
