<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_gif".
 *
 * @property int $id
 * @property int $ads_id
 * @property int $user_id
 * @property string $img
 * @property string $img_thumb
 *
 * @property Ads $ads
 */
class AdsGif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads_gif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ads_id', 'user_id'], 'integer'],
            [['user_id', 'img', 'img_thumb'], 'required'],
            [['img', 'img_thumb'], 'string', 'max' => 255],
            [['ads_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['ads_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ads_id' => 'Ads ID',
            'user_id' => 'User ID',
            'img' => 'Img',
            'img_thumb' => 'Img Thumb',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'ads_id']);
    }
}
