<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "org_info".
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
 * @property string $category_name
 * @property string $city_name
 * @property string $region_name
 * @property string $category_parent_name
 */
class OrgInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'org_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dt_add', 'dt_update', 'status', 'views', 'region_id', 'city_id', 'user_id', 'vip', 'category_id'], 'integer'],
            [['title', 'descr', 'user_id', 'category_id'], 'required'],
            [['descr'], 'string'],
            [['title', 'logo', 'header', 'slug', 'mail', 'phone', 'site', 'schedule', 'address', 'category_name', 'category_parent_name'], 'string', 'max' => 255],
            [['city_name', 'region_name'], 'string', 'max' => 50],
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
            'address' => 'Address',
            'category_name' => 'Category Name',
            'city_name' => 'City Name',
            'region_name' => 'Region Name',
            'category_parent_name' => 'Category Parent Name',
        ];
    }

    public static function get($slug){
        return static::find()->where(['slug'=>$slug])->one();
    }
}
