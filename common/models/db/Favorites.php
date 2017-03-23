<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $gist
 * @property integer $gist_id
 */
class Favorites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'gist', 'gist_id'], 'required'],
            [['user_id', 'gist_id'], 'integer'],
            [['gist'], 'string', 'max' => 255],
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
            'gist' => 'Gist',
            'gist_id' => 'Gist ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getorg_info()
    {
        return $this->hasOne(OrgInfo::className(), ['id' => 'id']);
    }
}
