<?php
//\common\classes\Debug::prn($ads);
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Избранные объявления';
$this->params['breadcrumbs'][] = ['label' => 'Мои объявления', 'url' => ['/personal_area/ads/ads_user_active']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('../ads/_menu')?>
<section class="kabinet-favorite">
    <div class="container">
        <div class="kabinet-favorite-left">
            <ul>
                <?php foreach($category as $item):?>
                    <li><a href="<?= Url::to(['/personal_area/favorites/ads_favorites', 'id-cat'=>$item['cat_id']])?>"><?= $item['name'];?> <span class="count"><?= $item['count']; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="kabinet-favorite-right">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <!-- open .bread -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumbs__list']
                ]) ?>
                <!-- close .bread -->

                <!-- close .container -->
            </article>

            <div class="top-menu">
                <ul class="kabinet-favorite-right_top-menu">
                    <li class="active"><a href="<?= Url::to(['/personal_area/favorites/ads_favorites'])?>"" >Объявления</a></li>
                    <li><a href="">Магазины</a></li>
                    <li><a href="">Спецпредложения</a></li>
                </ul>
                <?php if(!empty($ads)):?>
                    <a href="" class="delete-knopka delete-favorites-all" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-ads="ads" data-page="<?= $request->get('page', 1); ?>">Удалить из избранного</a>
                    <div class="checkbox0">
                        <input id="check0" type="checkbox" name="check" value="check0">
                        <label for="check0"></label>
                    </div>
                <?php endif;?>
            </div>
            <?php if(empty($ads)): ?>
                <?= $this->render('/error/error',['title' => 'У Вас нет ни одного объявления в закладках', 'link_title' => 'Начните покупать', 'url' => Url::toRoute(['/adsmanager/adsmanager/index'])]); ?>
            <?php else: ?>
            <!-- close .breadcrubs -->
            <?php foreach($ads as $item): //\common\classes\Debug::prn($item);?>
                <div class="kabinet-favorite-right-item">
                    <div class="average-ad-item <?=(in_array($item['ads']->status, [3,5])) ? 'average-ad-item-hide' : ''; ?>">
                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item['ads']->slug])?>" class="average-ad-item-thumb">
                            <?php if(empty($item['ads_img'])): ?>
                                <img src='/img/no-img.png' alt="<?= $item['ads']->title; ?>">
                            <?php else: ?>
                                <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item['ads']->title; ?>">
                            <?php endif; ?>
                        </a>
                        <div class="average-ad-item-content">
                            <span class="average-ad-star active-star-icon" data-gist="ad" data-gistid="<?= $item['ads']->id; ?>"></span>
                            <p class="average-ad-time"><?= \common\classes\DataTime::time($item['ads']->dt_update); ?></p>

                            <?php
                            $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item['ads']->category_id, []);
                            $listcat = array_reverse($listcat);
                            $k = 1;
                            foreach($listcat as $val): ?>
                                <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>" class="average-ad-category"><?= $val->name; ?></a>
                                <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>
                                <?php $k++; endforeach ?>
                            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item['ads']->slug])?>" class="average-ad-title"><?= $item['ads']->title; ?></a>
                            <p class="average-ad-geo">
                                <span class="geo-space"></span>
                                <a class="addressAds" href=""><?= $item['ads']['geobase_region'][0]->name; ?> | </a>
                                <a class="addressAds" href=""><?= $item['ads']['geobase_city']->name; ?></a>
                            </p>
                            <span class="average-ad-price"><?= $item['ads']->price; ?>
                                <span class="rubl-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 64.002 64.002">
                                          <path d="M54.628,9.375c-6.044-6.045-14.08-9.374-22.627-9.374c-8.548,0-16.583,3.329-22.627,9.374C3.329,15.419,0,23.454,0,32.001
                                            s3.329,16.582,9.374,22.626c6.044,6.045,14.079,9.374,22.627,9.374c8.547,0,16.583-3.329,22.627-9.374
                                            c6.045-6.044,9.374-14.079,9.374-22.626S60.673,15.419,54.628,9.375z M53.214,53.213c-5.666,5.667-13.2,8.788-21.213,8.788
                                            c-8.014,0-15.547-3.121-21.213-8.788C5.121,47.547,2,40.014,2,32.001s3.121-15.546,8.788-21.212
                                            c5.666-5.667,13.199-8.788,21.213-8.788c8.013,0,15.547,3.121,21.213,8.788c5.667,5.666,8.788,13.199,8.788,21.212
                                            S58.881,47.547,53.214,53.213z"/>
                                          <path d="M31.001,16.001h-6h-1H23v18h-4v2L23,36v4.001h-4v2h4v6h2v-6h7v-2h-7v-4.002l5.909-0.002
                                            c0.054,0.005,0.392,0.033,0.923,0.033c1.749,0,5.594-0.308,8.304-2.784c1.9-1.735,2.864-4.173,2.864-7.245s-0.964-5.51-2.864-7.245
                                            C36.603,15.527,31.14,15.983,31.001,16.001z M38.796,31.763c-2.875,2.633-7.655,2.248-7.795,2.238H25V18l6.091-0.003
                                            c0.047-0.005,4.806-0.403,7.696,2.235c1.469,1.341,2.213,3.283,2.213,5.769C41.001,28.483,40.259,30.422,38.796,31.763z"/>
                                      </svg>
                                </span>
                          </span>

                        </div>
                    </div>

                    <div class="checkbox0">
                        <input id="check<?=$item->id; ?>" class="ads-check" type="checkbox" data-id="<?=$item->id; ?>" name="check" value="<?=$item->id; ?>">
                        <label for="check<?=$item->id; ?>"></label>
                    </div>
                    <?=(in_array($item['ads']->status, [3,5])) ? '<span class="close-ad">Объявление закрыто или удалено</span><div class="close-ad__fon"></div>' : ''; ?>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="pagination">
                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'options' => [
                            'class' => '',
                        ],
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => '',
                        'nextPageLabel' => '',
                        'activePageCssClass' => 'active',

                    ]) ?>
            </div>
        </div>

    </div>
</section>
