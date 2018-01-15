<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "vk_user_groups".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $domain
 * @property string $name
 * @property integer $owner_id
 * @property string $photo
 * @property integer $status
 * @property integer $prod_count
 * @property integer $members_count
 * @property integer $last_update
 */
class VkUserGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_user_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'domain', 'name', 'owner_id', 'photo'], 'required'],
            [['user_id', 'owner_id', 'status', 'prod_count', 'members_count', 'last_update'], 'integer'],
            [['domain', 'name', 'photo'], 'string', 'max' => 255],
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
            'domain' => 'Domain',
            'name' => 'Name',
            'owner_id' => 'Owner ID',
            'photo' => 'Photo',
            'status' => 'Status',
            'prod_count' => 'Кол-во товаров',
            'members_count' => 'Кол-во участников',
            'last_update' => 'Последнее обновление',
        ];
    }
}
