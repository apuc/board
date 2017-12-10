<?php
use yii\helpers\Url;
?>

<section class="home-slider white-slider">
    <div class="container">
        <h3>ТОП объявления</h3>
        <a href="<?= Url::toRoute(['/adsmanager/adsmanager/index'])?>">смотреть все</a>
        <div class="owl-model">

            <?php foreach($ads as $item):
                /*\common\classes\Debug::prn($item);*/
                ?>

                <div class="slide">
                    <?php foreach ($item['adsDopStatus'] as $adsStatus){
                        if($adsStatus->status_id == 4 ){
                            ?>
                            <span class="vip-circle">vip</span>
                            <?php
                        }
                    }?>
                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="slide-link">
                        <?php if(empty($item['ads_img'])): ?>
                            <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                        <?php else: ?>
                            <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                        <?php endif; ?>

                        <h4><?= $item->title; ?></h4>
                    </a>
                    <p><?= number_format($item->price, 0, '.', ' '); ?> <span class="rubl-icon">
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
					</span></p>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
