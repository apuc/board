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
                          <?php if(empty($item['ads_img'])): ?>
                              <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                          <?php else: ?>
                              <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                          <?php endif; ?>
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
                              <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])?>"><?= $item['geobase_region'][0]->name; ?></a> |
                              <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])?>"><?= $item['geobase_city']->name; ?></a>
                          </p>
                          <span class="average-ad-price"><?= $item->price; ?>
                                    <span class="rubl-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 510.127 510.127">
											<path d="M34.786,428.963h81.158v69.572c0,3.385,1.083,6.156,3.262,8.322c2.173,2.18,4.951,3.27,8.335,3.27h60.502
												c3.14,0,5.857-1.09,8.152-3.27c2.295-2.166,3.439-4.938,3.439-8.322v-69.572h182.964c3.377,0,6.156-1.076,8.334-3.256
												c2.18-2.178,3.262-4.951,3.262-8.336v-46.377c0-3.365-1.082-6.156-3.262-8.322c-2.172-2.18-4.957-3.27-8.334-3.27H199.628v-42.754
												h123.184c48.305,0,87.73-14.719,118.293-44.199c30.551-29.449,45.834-67.49,45.834-114.125c0-46.604-15.283-84.646-45.834-114.125
												C410.548,14.749,371.116,0,322.812,0H127.535c-3.385,0-6.157,1.089-8.335,3.256c-2.173,2.179-3.262,4.969-3.262,8.335v227.896
												H34.786c-3.384,0-6.157,1.145-8.335,3.439c-2.172,2.295-3.262,5.012-3.262,8.151v53.978c0,3.385,1.083,6.158,3.262,8.336
												c2.179,2.18,4.945,3.256,8.335,3.256h81.158v42.754H34.786c-3.384,0-6.157,1.09-8.335,3.27c-2.172,2.166-3.262,4.951-3.262,8.322
												v46.377c0,3.385,1.083,6.158,3.262,8.336C28.629,427.887,31.401,428.963,34.786,428.963z M199.628,77.179h115.938
												c25.6,0,46.248,7.485,61.953,22.46c15.697,14.976,23.549,34.547,23.549,58.691c0,24.156-7.852,43.733-23.549,58.691
												c-15.705,14.988-36.354,22.473-61.953,22.473H199.628V77.179z"/>
										</svg>
									</span>
                          </span>
                          <?= \common\classes\Ads::getAdsDayEnd($item->dt_update, $item->id); ?>
                          <div>

                          </div>

                          <?php /*\common\classes\Debug::prn(time() - 12*24*3600)*/?>
                      </div>
                  </div>
                  <!--<div class="bar-two bar-con">
                      <div class="bar" data-percent="50"></div>
                      <span>срок размещения: 15 дней</span>
                  </div>-->
                  <?= \common\classes\Ads::adsDayEnd($item->dt_update); ?>

                  <div class="item-edit-ad">
                      <a href="" class="delete remove-ads" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?=$item->id;?>" data-ads="active" data-page="<?= $request->get('page', 1); ?>"> <span class="del-icon"></span>удалить</a>
                      <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/update', 'id' => $item->id]); ?>" class="edit"> <span class="edit-icon"></span>редактировать</a>
                      <a href="" class="remove-publication remove" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?=$item->id;?>" data-page="<?= $request->get('page', 1); ?>"> <span class="remove-icon"></span>снятьс публикации</a>
                      <!-- <a href="" class="publish-ad"><span class="publish-icon"></span>опубликовать</a> -->
                      <!--<span class="edit-accordion">дополнительно</span>
                      <div class="edit-accordion-list">
                          <a href="">Сделать вип</a>
                          <a href="">Выделить обьявление</a>
                          <a href="">Поднять объявление</a>
                      </div>-->
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