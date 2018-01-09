<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;

/**
 * This is the model class for table "vk_product_photo".
 *
 * @property integer $id
 * @property integer $vk_product_id
 * @property string $photo
 */
class VkProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_product_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vk_product_id', 'photo'], 'required'],
            [['vk_product_id'], 'integer'],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vk_product_id' => 'Vk Product ID',
            'photo' => 'Photo',
        ];
    }

    public function savePhotos($photos, $productId)
    {
        if(!empty($photos)){
            foreach ((array)$photos as $photo){
                $model = new VkProductPhoto();
                $model->vk_product_id = $productId;
                $model->photo = $photo->{'photo_' . $photo->width};
                $model->save();
            }
        }
    }
}
