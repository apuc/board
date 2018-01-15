<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 22:42
 * @var $userGroups \common\models\db\VkUserGroups
 * @var $userCompany \common\models\db\Organizations
 */

use frontend\modules\personal_area\widgets\MenuPersonalArea;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Интеграция | ВК';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= MenuPersonalArea::widget() ?>
<style>
    .parseStatus {
        display: block;
        width: 100%;
        margin-left: 34px;
        margin-top: 15px;
        color: red;
    }
</style>
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
                    <input type="text" name="link-group" id="vk_link" required placeholder="Вставьте ссылку">
                    <button type="button" id="add_vk_btn">Добавить</button>
                </form>
                <div id="vk-parse-status" class="parseStatus"></div>
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
                <span id="insert-point"></span>
                <?php foreach ($userGroups as $group): ?>
                    <div class="group-item">
                        <?php echo $this->render('_update_group', ['group' => $group, 'userCompany' => $userCompany]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</section>
<!-- end _cabinet-integration.html-->