<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_dop_status".
 *
 * @property integer $id
 * @property integer $status_id
 * @property integer $ads_id
 * @property integer $dt_add
 *
 * @property Ads $ads
 * @property Status $status
 */
class AdsDopStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_dop_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'ads_id', 'dt_add'], 'required'],
            [['status_id', 'ads_id', 'dt_add'], 'integer'],
            [['ads_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['ads_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'ads_id' => 'Ads ID',
            'dt_add' => 'Dt Add',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'ads_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
