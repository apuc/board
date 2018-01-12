<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 22:42
 */

use frontend\modules\personal_area\widgets\MenuPersonalArea;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'История платежей';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= MenuPersonalArea::widget() ?>
<!-- start _cabinet-integration.html-->
<section class="cabinet-integration">
    <div class="container">
        <div class="cabinet-integration__left">
            <div class="cabinet-integration__left--link">
                <a href="#">Вконтакте</a>
                <a href="#">Фейсбук</a>
                <a href="#">Инстаграмм</a>
            </div>
        </div>
        <div class="cabinet-integration__right">
            <h2 class="title">Интеграция ВКонтакте</h2>
            <div class="subtitle">
                <h3>У Вас добавлено <a href="#">10 групп</a></h3>
            </div>
            <div class="cabinet-integration__right--add-public">
                <form action="#">
                    <label for="link-social-group">Ссылка на группу</label>
                    <input type="text" name="link-group" id="link-social-group" required placeholder="Вставьте ссылку">
                    <button type="submit">Добавить</button>
                </form>
                <div class="description">
                    <p>
                        Сразу после настройки интеграции вашего сообщества Вконтакте все
                        посетители нашего сайта будут видеть ваши товары и услуги.
                        Синхронизируйте каталог товаров группы вКонтакте и продавайте еще
                        успешнее
                    </p>
                </div>
            </div>
            <div class="cabinet-integration__right--group-wrapper">
                <div class="group-item">
                    <div class="img">
                        <a href="#">
                            <img src="img/rubon-logo.png" alt="">
                        </a>
                    </div>
                    <div class="links">
                        <a href="#">Барахолка |</a>
                        <a href="#">Донецк |</a>
                        <a href="#">Объявления |</a>
                        <a href="#">РУБОН</a>
                    </div>
                    <div class="partner">
                        <a href="#">Участники 2 675</a>
                    </div>
                    <div class="goods">
                        <a href="#">Количество товаров 345</a>
                        <div class="goods__actions">
                            <a href="#" class="goods__action get-goods-btn">
                                <span class="delivery_icon"></span>
                                <span class="goods__text">Получить товары</span>
                            </a>
                            <a href="#" class="goods__action">
                                <span class="del_icon"></span>
                                <span class="goods__text">Удалить группу</span>
                            </a>
                        </div>
                    </div>
                    <div class="get-goods">
                        <div class="field-ads-private_business required has-success">
                            <div class="form-line"><label class="label-name" for="ads-private_business">Частное лицо / Бизнес</label>
                                <select id="ads-private_business" class="input-name jsHint" name="Ads[private_business]" aria-required="true" aria-invalid="false">
                                    <option value="">Выберите</option>
                                    <option value="0">Частное лицо</option>
                                    <option value="1">Бизнес</option>
                                </select>
                            </div>
                            <div class="selectBusiness">
                                <div class="form-line"><label class="label-name">Выберите организацию</label>
                                    <select class="input-name" name="Ads[business_id]">
                                        <option value="">Выберите</option>
                                        <option value="12">Веб студия ArtCraft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cabinet-integration__right--group-wrapper">
                    <div class="group-item">
                        <div class="img">
                            <a href="#">
                                <img src="img/rubon-logo.png" alt="">
                            </a>
                        </div>
                        <div class="links">
                            <a href="#">Барахолка |</a>
                            <a href="#">Донецк |</a>
                            <a href="#">Объявления |</a>
                            <a href="#">РУБОН</a>
                        </div>
                        <div class="partner">
                            <a href="#">Участники 2 675</a>
                        </div>
                        <div class="goods">
                            <a href="#">Количество товаров 345</a>
                            <div class="goods__actions">
                                <a href="#" class="goods__action get-goods-btn">
                                    <span class="delivery_icon"></span>
                                    <span class="goods__text">Получить товары</span>
                                </a>
                                <a href="#" class="goods__action">
                                    <span class="del_icon"></span>
                                    <span class="goods__text">Удалить группу</span>
                                </a>
                            </div>
                        </div>
                        <div class="get-goods">
                            <div class="field-ads-private_business required has-success">
                                <div class="form-line"><label class="label-name" for="ads-private_business">Частное лицо / Бизнес</label>
                                    <select id="ads-private_business" class="input-name jsHint" name="Ads[private_business]" aria-required="true" aria-invalid="false">
                                        <option value="">Выберите</option>
                                        <option value="0">Частное лицо</option>
                                        <option value="1">Бизнес</option>
                                    </select>
                                </div>
                                <div class="selectBusiness">
                                    <div class="form-line"><label class="label-name">Выберите организацию</label>
                                        <select class="input-name" name="Ads[business_id]">
                                            <option value="">Выберите</option>
                                            <option value="12">Веб студия ArtCraft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cabinet-integration__right--group-wrapper">
                    <div class="group-item">
                        <div class="img">
                            <a href="#">
                                <img src="img/rubon-logo.png" alt="">
                            </a>
                        </div>
                        <div class="links">
                            <a href="#">Барахолка |</a>
                            <a href="#">Донецк |</a>
                            <a href="#">Объявления |</a>
                            <a href="#">РУБОН</a>
                        </div>
                        <div class="partner">
                            <a href="#">Участники 2 675</a>
                        </div>
                        <div class="goods">
                            <a href="#">Количество товаров 345</a>
                            <div class="goods__actions">
                                <a href="#" class="goods__action get-goods-btn">
                                    <span class="delivery_icon"></span>
                                    <span class="goods__text">Получить товары</span>
                                </a>
                                <a href="#" class="goods__action">
                                    <span class="del_icon"></span>
                                    <span class="goods__text">Удалить группу</span>
                                </a>
                            </div>
                        </div>
                        <div class="get-goods">
                            <div class="field-ads-private_business required has-success">
                                <div class="form-line"><label class="label-name" for="ads-private_business">Частное лицо / Бизнес</label>
                                    <select id="ads-private_business" class="input-name jsHint" name="Ads[private_business]" aria-required="true" aria-invalid="false">
                                        <option value="">Выберите</option>
                                        <option value="0">Частное лицо</option>
                                        <option value="1">Бизнес</option>
                                    </select>
                                </div>
                                <div class="selectBusiness">
                                    <div class="form-line"><label class="label-name">Выберите организацию</label>
                                        <select class="input-name" name="Ads[business_id]">
                                            <option value="">Выберите</option>
                                            <option value="12">Веб студия ArtCraft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- end _cabinet-integration.html-->