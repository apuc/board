<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $dt_add
 * @property integer $dt_update
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property integer $status
 * @property integer $views
 * @property integer $top
 * @property string $cover
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $price
 * @property string $name
 * @property string $phone
 * @property string $mail
 *
 * @property Category $category
 * @property Status $status0
 * @property User $user
 * @property AdsFieldsValue[] $adsFieldsValues
 * @property AdsImg[] $adsImgs
 * @property AdsShop[] $adsShops
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'title', 'content', 'region_id', 'city_id', 'name', 'phone', 'mail', 'price'], 'required'],
            [['user_id', 'category_id', 'dt_add', 'dt_update', 'status', 'views', 'top', 'region_id', 'city_id', 'price'], 'integer'],
            [['content'], 'string'],
            [['title', 'slug', 'cover', 'name', 'phone', 'mail'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'title' => 'Title',
            'content' => 'Content',
            'slug' => 'Slug',
            'status' => 'Status',
            'views' => 'Views',
            'top' => 'Top',
            'cover' => 'Cover',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'price' => 'Price',
            'name' => 'Name',
            'phone' => 'Phone',
            'mail' => 'Mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsValues()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['ads_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsImgs()
    {
        return $this->hasMany(AdsImg::className(), ['ads_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsShops()
    {
        return $this->hasMany(AdsShop::className(), ['ads_id' => 'id']);
    }
}
