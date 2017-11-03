<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "olx".
 *
 * @property integer $id
 * @property integer $id_ads
 */
class Olx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ads'], 'required'],
            [['id_ads'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ads' => 'Id Ads',
        ];
    }
}
