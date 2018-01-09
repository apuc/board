<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "vk_groups".
 *
 * @property integer $id
 * @property string $domain
 * @property string $name
 * @property integer $owner_id
 * @property integer $status
 */
class VkGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain', 'name', 'owner_id'], 'required'],
            [['owner_id', 'status'], 'integer'],
            [['domain', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
            'name' => 'Name',
            'owner_id' => 'Owner ID',
            'status' => 'Status',
        ];
    }
}
