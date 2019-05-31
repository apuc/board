<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 22.09.2016
 * Time: 3:07
 */

namespace frontend\modules\adsmanager\widgets;

use common\classes\AdsCategory;
use common\classes\Debug;
use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;

class RelatedAds extends Widget
{
    public $idCat;
    public $ads;
    public $limit = 5;
    public $slider = false;
    public $categoriesArray;

	public function run()
	{
		$count = \common\classes\Ads::getCountAdsCat($this->idCat, $this->ads->id);
		$query = Ads::find()
			->select(['ads.*', 'IF (favorites.id IS NOT NULL, 1, 0) is_f'])
			->leftJoin('favorites', '`ads`.`id` = `favorites`.`gist_id` AND `favorites`.`user_id` = :user_id')
			->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
			->where(['!=', '`ads`.`id`', $this->ads->id])
			->andWhere(['status' => [Ads::STATUS_ACTIVE, Ads::STATUS_VIP]])
			->params([':user_id' => \Yii::$app->user->id]);

			if ($count < 10) {

//				$parentId = \common\classes\Ads::getCatIdParent($this->ads->category_id);
//				$query->andWhere(['category_id' => AdsCategory::getParentAllCategory($parentId)]);

				//Находим родительскую категорию категории нашего продукта
				foreach ($this->categoriesArray as $category){
					if($category['id'] == $this->idCat){
						$parentId = $category['parent_id'];
						break;
					}
				}//foreach

				$parentCategories = [];
				$parentIds = [];

				//Находим все дочерние категории родительской категории нашего продукта
				foreach ($this->categoriesArray as $cat)
					if($cat['parent_id'] == $parentId)
						$parentCategories[] = $cat;

				//Собираем массив из id найденных категорий
				foreach ($parentCategories as $parCat)
					$parentIds[] = $parCat['id'];

				//Добавляем в массив id родительских категорий для увеличения количества похожих продуктов
				foreach ($this->categoriesArray as $item){
					foreach ($parentCategories as $parentCategory){
						if($parentCategory['parent_id'] == $item['id'])
							$parentIds[] = $item['id'];
					}
				}

				$query->andWhere(['category_id' => $parentIds]);

			} else {
				$query->andWhere(['category_id' => $this->idCat]);
			}

		$query
			->with('ads_img')
			->orderBy('RAND()')
			->limit($this->limit);

		return $this->render(
			'related-ads',
			[
				'ads' => $query->all(),
				'slider' => $this->slider,
			]
		);
	}//run
}