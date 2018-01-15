<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "vk_prod_ads".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $ad_id
 * @property integer $vk_prod_id
 * @property integer $owner_id
 */
class VkProdAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_prod_ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ad_id', 'vk_prod_id', 'owner_id'], 'required'],
            [['user_id', 'ad_id', 'vk_prod_id', 'owner_id'], 'integer'],
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
            'ad_id' => 'Ad ID',
            'vk_prod_id' => 'Vk Prod ID',
            'owner_id' => 'Owner ID',
        ];
    }
}
