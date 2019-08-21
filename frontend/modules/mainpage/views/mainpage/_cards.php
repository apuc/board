<?php
/**
 * @var $products array
 */
?>
<?php $categories = Yii::$app->cache->getOrSet('categories', function (){return \common\classes\AdsCategory::getAllCategories();})  ?>

<?php foreach ($products as $product): ?>
<!--	--><?php //
//		\common\classes\Debug::prn($product->pictures);
//		exit;
//	?>
	<?php
		$catsBread = \common\classes\AdsCategory::getCategoriesBreadcrumbs($product->category_id, $categories, []);
		$catsBread = array_reverse($catsBread);
	?>
	<div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
		<div class="single-card__main">
			<div class="single-card__top">
				<div class="card-bg"></div>
				<div class="single-card__overlay">
					<button class="gifer-play-button"></button>
					<a class="js-openModal" href="#" data-modal="#card-detail<?= $product->id; ?>"></a><span
						class="single-card__view single-card__city"><i
							class="fa fa-camera"></i><span><?= count($product['pictures']);?></span></span>
				</div>
				<div class="single-card__top-content">
					<a class="single-card__city" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $product['geobase_city']->id])?>">
						<?= $product['geobase_city']->name; ?>
					</a>
					<div class="single-card__like add-in-fav <?php if($product->is_f) echo 'in-fav'?>"
						  data-gist="ad"
						  data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $product->id;} else echo -1?>">
					 <i class="fa <?php if($product->is_f) echo 'fa-heart'; else echo 'fa-heart-o'?>"></i>
					</div>
				</div>

				<?php if ( $product['pictures'] == []): ?>
					<img class="bg-img" src='/img/no-img-big.png' alt="<?= $product->title; ?>">
				<?php else: ?>
					<?php if(mb_strpos($product['pictures'][0]->img, '.gif') !== false): ?>

						<div class="single-card__gif-content">
							<div class="play-gif-button" style="
									/*display: none;*/
									position: absolute;
									left: 15px;
									top: 15px;
									width: 0;
									height: 0;
									z-index: 1;
									border-top: 30px solid transparent;
									border-bottom: 30px solid transparent;
									border-left: 30px solid whitesmoke;"
							></div>
							<span class="single-card__gif-label">Gif</span>
						</div>
						<img 	class="bg-img-to-canvas"
								src="<?= $product['pictures'][0]->img_thumb; ?>"
								rel:animated_src="<?= $product['pictures'][0]->img_small;?>"

						/>
						<img 	class="bg-img"
								src="<?= $product['pictures'][0]->img_thumb; ?>"
						/>

<!--						<img-->
<!--								class="bg-img"-->
<!--								src="--><?//= $product['pictures'][0]->img_thumb; ?><!--"-->
<!--								alt="--><?//= $product->title; ?><!--"-->
<!--								data-gif_src="--><?//= $product['pictures'][0]->img_small;?><!--"-->
<!--						/>-->
					<?php else: ?>
						<img class="bg-img" src="<?= $product['pictures'][0]->img; ?>?width=600" alt="<?= $product->title; ?>" />
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="single-card__bottom">
				<a class="single-card__title" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $product->slug]) ?>">
					<?= $product->title; ?>
				</a>
				<span class="price price-adaptive price-small"><?= $product->price; ?>₽</span>
			</div>
		</div>
		<div class="modal modal__detail container modal-js" id="card-detail<?= $product->id?>">
			<div class="single-card__detail">
				<button class="button_close js-modalClose">×</button>
				<div class="single-card__detail-content">
					<div class="single-card__detail-img">
						<?php if ($product['pictures'] == []): ?>
							<img class="bg-img" src='/img/no-img-big.png' alt="<?= $product->title; ?>">
						<?php else: ?>
							<?php if(mb_strpos($product['pictures'][0]->img, '.gif') !== false): ?>
								<div class="single-card__gif-content">
									<span class="single-card__gif-label">Gif</span>
								</div>
								<img
										class="bg-img"
										src="<?= $product['pictures'][0]->img_thumb; ?>"
										alt="<?= $product->title; ?>"
										data-gif_src="<?= $product['pictures'][0]->img_small;?>"
								/>
							<?php else: ?>
								<img class="bg-img" src="<?= $product['pictures'][0]->img; ?>?width=600" alt="<?= $product->title; ?>" />
							<?php endif; ?>
						<?php endif; ?>
						<div class="single-card__detail-img-content">
							<span class="single-card__view single-card__city">
								<i class="fa fa-camera"></i>
								<span><?= count($product->pictures);?></span>
							</span>
						</div>
					</div>
                    <div class="single-card__detail-main">
						<?php  foreach ($catsBread as $cat): ?>
							<a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $cat['slug']]); ?>"
							   class="button button_small button_gray sm-none"><?= $cat['name']; ?></a>
						<?php endforeach; ?>

						<h3 class="single-card__detail-title mb15 mt20">
							<?= $product->title; ?>
						</h3>
						<div class="single-card__info-second">
							<div class="sm-block mr-auto">
								<?php  foreach ($catsBread as $cat): ?>
									<a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $cat['slug']]); ?>"
									   class="button button_small button_gray"><?= $cat['name']; ?></a>
								<?php endforeach; ?>
							</div>
							<span class="single-card__detail-date">Добавлено: <?= \common\classes\DataTime::time($product->dt_update); ?></span>
							<div class="single-card__detail-view sm-none">
								<img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
								<span><?= $product->views?></span>
							</div>
							<a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
								<svg class="single-card__icon ico ico_gray">
									<use xlink:href="/theme/images/svg.svg#nav">
									</use>
								</svg>
								<span class="ml5"><?= $product['geobase_city']->name; ?></span>
							</a>
						</div>
						<div class="single-card__info">
							<?= \yii\helpers\StringHelper::truncate(strip_tags($product->content),150,'...');?>
						</div>
						<div class="d-flex flex-wrap align-items-center justify-content-end mt10">
							<div class="single-card__detail-like mt5 mb5 add-in-fav <?php if($product->is_f) echo 'in-fav'?>"
								  data-gist="ad"
								  data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $product->id;} else echo -1?>">
								 <i class="fa <?php if($product->is_f) echo 'fa-heart'; else echo 'fa-heart-o';?>"></i>
								 <span>Избранное</span>
							</div>
							<div class="sm-block mr-auto">
								<div class="single-card__detail-view">
									<img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
									<span><?= $product->views; ?></span>
								</div>
							</div>
							<a class="button button_red mt5 mb5 ml15" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $product->slug]) ?>">
								Посмотреть полностью
							</a>
						</div>

						<?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(
							[
								'ads' => $product,
								'idCat' => $product->category_id,
								'limit' => 10,
								'slider' => true,
								'categoriesArray' => $categories
							])
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>