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
            [['title', 'descr', 'user_id', 'category_id','address'], 'required'],
            [['descr','address'], 'string'],
            [['dt_add', 'dt_update', 'status', 'views', 'region_id', 'city_id', 'user_id', 'vip', 'category_id'], 'integer'],
            [['title', 'logo', 'header', 'slug', 'mail', 'phone', 'site', 'schedule'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'logo' => 'Logo',
            'header' => 'Header',
            'slug' => 'Slug',
            'descr' => 'Descr',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
            'views' => 'Views',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'user_id' => 'User ID',
            'mail' => 'Mail',
            'phone' => 'Phone',
            'site' => 'Site',
            'schedule' => 'Schedule',
            'vip' => 'Vip',
            'category_id' => 'Category ID',
            'address' => 'Адрес',
        ];
    }
}
