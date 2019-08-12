<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 16.06.2016
 * Time: 13:49
 */

namespace frontend\modules\adsmanager\models;


use common\classes\Debug;
use common\models\db\AdsDopStatus;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsValue;
use common\models\db\AdsGif;
use common\models\db\AdsImg;
use common\models\db\Category;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class Ads extends \common\models\db\Ads
{
    public $is_f = null;
    public $pictures = null;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'region_id' => [
                'class' => 'common\behaviors\SaveRegionId',
                'in_attribute' => 'city_id',
            ],
        ];
    }


    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = ['title', 'string', 'max' => 70];
        $rules['content'] = ['title', 'string', 'max' => 4096];
        $rules['phone'] = ['phone', 'string', 'max' => 70];
        $rules['phone'] = [['phone'], 'required'];
        $rules['name'] = [['name'], 'required'];
        $rules['name'] = ['name', 'string', 'min' => 2, 'max' => 20];
        $rules['private_business'] = [['private_business'], 'required'];
        $rules['pars'] = ['pars', 'integer'];
        return $rules;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_img()
    {
        return $this->hasMany(AdsImg::className(), ['ads_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
    public function getads_gif()
	{
		return $this->hasMany(AdsGif::className(), ['ads_id' => 'id']);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_region()
    {
        return $this->hasMany(GeobaseRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_city()
    {
        return $this->hasOne(GeobaseCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_fields_value()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['ads_id' => 'id']);
    }

	/**
	 *Возвращает товары в AdsmanagerController по кнопке "Показать все объявления из этой категории"
	 * @param Category[] $categoriesId
	 * @return array
	 */
	public static function getAllAds($categoriesId = []){

		$query = Ads::find()
			->select(['ads.*', 'IF (favorites.id IS NOT NULL, 1, 0) is_f'])
			->leftJoin('favorites', '`ads`.`id` = `favorites`.`gist_id` AND `favorites`.`user_id` = :user_id')
			->where(['status' => [Ads::STATUS_ACTIVE, Ads::STATUS_VIP]])
			->andWhere(['!=', '`ads`.`id`', 1])
			->andFilterWhere(['`ads`.`category_id`' => $categoriesId])
			->params([':user_id' => \Yii::$app->user->id])
			->groupBy('`ads`.`id`');

		$pagination = new Pagination([
			'defaultPageSize' => 12,
			'totalCount' => $query->count(),
			'pageParam' => 'p'
		]);

		if($pagination->pageCount < \Yii::$app->request->get('p')){
			return ['ads' => [], 'pagination' => $pagination];
		}


		if(isset($_GET['sort'])){
			switch($_GET['sort']){
				case 'cheap':
					$query->orderBy('`ads`.`status` ASC, price');
					break;
				case 'dear':
					$query->orderBy('`ads`.`status` ASC, price DESC');
					break;
			}
		}
		else{
			$query->orderBy('`ads`.`status` ASC, dt_update DESC');
		}//else

		$ads = $query
			->offset($pagination->offset)
			->limit($pagination->limit)
			->with('ads_fields_value','ads_img', 'ads_gif', 'geobase_region', 'geobase_city', 'adsDopStatus')
			->all();

		foreach ($ads as $product) {
			$product->pictures = array_merge($product['ads_gif'], $product['ads_img']);
		}


		return ['ads' => $ads, 'pagination' => $pagination];
	}//getAllAds

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Категория',
            'title' => 'Заголовок',
            'content' => 'Описание',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'price' => 'Цена',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'mail' => 'Mail',
            'state' => 'Состояние',
            'private_business' => 'Тип'
        ];
    }
    public function getCategoryAds()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(GeobaseRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(GeobaseCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsDopStatus()
    {
        return $this->hasMany(AdsDopStatus::className(), ['ads_id' => 'id']);
    }



    public function isTop()
    {
      if($this->top == 1){
          return true;
      }

      return false;
    }
}