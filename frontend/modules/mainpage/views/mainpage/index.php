<?php
/**
 * @var $arr array
 */

use frontend\widgets\AuthUser;
use common\classes\Debug;

//$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Бесплатные объявления ДНР, ЛНР: продажа,покупка,недвижимость',
        'description' => 'Все бесплатные объявления ДНР, ЛНР без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
        'img' => 'https://rub-on.ru/img/Logotip_RUBON.png',
    ]);
?>
<section class="index-main">
    <div class="container">
        <div class="cards">
            <?= $this->render('_cards', ['products' => $arr['ads']]) ?>
        </div>
        <div class="d-flex justify-content-center mt20">
            <button id="load-c" class="button button_gray button_big" data-page="2">Показать еще</button>
        </div>
    </div>
</section>
