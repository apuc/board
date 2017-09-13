<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "site_access_api".
 *
 * @property integer $id
 * @property string $name
 * @property string $mail
 * @property string $site
 * @property integer $visible_ads
 * @property string $api_key
 */
class SiteAccessApi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_access_api';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mail', 'site'], 'required'],
            [['visible_ads'], 'integer'],
            [['name', 'mail', 'site', 'api_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'mail' => 'Mail',
            'site' => 'Site',
            'visible_ads' => 'Visible Ads',
            'api_key' => 'Api Key',
        ];
    }
}
