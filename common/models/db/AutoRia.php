<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_ria".
 *
 * @property integer $id
 * @property integer $id_ads
 */
class AutoRia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_ria';
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
