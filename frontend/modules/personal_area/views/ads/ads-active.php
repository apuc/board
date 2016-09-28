<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Мои объявления | Активные';

$this->params['breadcrumbs'][] = ['label' => 'Мои объявления', 'url' => ['/personal_area/ads/ads_user_active']];
$this->params['breadcrumbs'][] = ['label' => 'Активные'];

echo $this->render('_menu');
?>

<section class="kabinet-active-ad">
  <div class="container">
    <div class="kabinet-active-ad__left">
      <ul>
        <li><a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active'])?>">Управление объявлениями</a></li>
        <li><a href="<?= Url::toRoute(['/adsmanager/adsmanager/create'])?>">Создание нового объявления</a></li>
      </ul>
    </div>
    <div class="kabinet-active-ad__right">
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
      <!-- close .breadcrubs -->
      <div class="kabinet-active-ad__additionaly-option">
        <ul>
          <li class="option active" ><a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active'])?>">Активные</a></li>
          <li class="option "><a href="<?= Url::toRoute(['/personal_area/ads/ads_user_not_active'])?>">Неактивные</a></li>
          <li class="option "><a href="<?= Url::toRoute(['/personal_area/ads/ads_user_moder'])?>">На проверке </a></li>
        </ul>
          <?php if(!empty($ads)): ?>

                <!--<a href="" class="option-2"><span class="up-option"></span>Активировать на 60 дней и поднять</a>-->
                <a href="" class="option-2 delete-all" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-ads="active" data-page="<?= $request->get('page', 1); ?>">Удалить</a>
                <a href="" class="option-2 remove-publication-all" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-page="<?= $request->get('page', 1); ?>">Снять с публикации</a>
                <div class="checkbox0">
                  <input id="check0" type="checkbox" name="check" value="check0">
                  <label for="check0"></label>
                </div>
          <?php endif; ?>
      </div>
        <?php if(empty($ads)): ?>
            <?= $this->render('/error/error',['title' => 'У Вас нет активных объявлений', 'link_title' => 'Добавить объявление', 'url' => Url::toRoute(['/adsmanager/adsmanager/create'])]); ?>
        <?php else: ?>

            <div class="kabinet-active-ad__content">
          <?php foreach ($ads as $item):
              //\common\classes\Debug::prn($item);?>
              <div class="item">
                  <div class="kabinet-active-ad__content_ad">
                      <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-item-thumb">
                          <img src="/<?= $item['ads_img'][0]->img_thumb; ?>" alt=""/>
                      </a>
                      <div class="average-ad-item-content">
                          <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                          <?php
                          $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                          $listcat = array_reverse($listcat);
                          $k = 1;
                          foreach($listcat as $val): ?>
                              <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>" class="average-ad-category"><?= $val->name; ?></a>
                              <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>
                              <?php $k++; endforeach ?>
                          <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-title"><?= $item->title; ?></a>
                          <p class="average-ad-geo">
                              <span class="geo-space"></span>
                              <a class="addressAds" href=""><?= $item['geobase_region'][0]->name; ?> | </a>
                              <a class="addressAds" href=""><?= $item['geobase_city']->name; ?></a>
                          </p>
                          <span class="average-ad-price"><?= $item->price; ?>
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
                  <!--<div class="bar-two bar-con">
                      <div class="bar" data-percent="50"></div>
                      <span>срок размещения: 15 дней</span>
                  </div>-->
                  <div class="item-edit-ad">
                      <a href="" class="edit"> <span class="edit-icon"></span>редактировать</a>
                      <span class="edit-accordion">дополнительно</span>
                      <div class="edit-accordion-list">
                          <a href=""><span class="edit-icon-not-kasskade"></span>Редактировать</a>
                          <a href="" class="remove-publication" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?=$item->id;?>" data-page="<?= $request->get('page', 1); ?>">
                              <span class="eye-hide"></span>
                              Снять с публикации
                          </a>
                          <a href="" class="remove-ads" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?=$item->id;?>" data-ads="active" data-page="<?= $request->get('page', 1); ?>">
                              <span class="korzina"></span>
                              Удалить
                          </a>
                      </div>
                  </div>
                  <div class="checkbox">
                      <input id="check<?=$item->id; ?>" class="ads-check" type="checkbox" data-id="<?=$item->id; ?>" name="check" value="<?=$item->id; ?>">
                      <label for="check<?=$item->id; ?>"></label>
                  </div>
              </div>
          <?php  endforeach; ?>
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
        <?php endif; ?>
    </div>

  </div>

</section>