<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 13.01.2018
 * Time: 19:58
 * @var $group \common\models\db\VkUserGroups
 * @var $userCompany \common\models\db\Organizations
 */
use yii\helpers\Html;

?>
<div class="img">
    <a href="#">
        <?= Html::img($group->photo) ?>
    </a>
</div>
<div class="links">
    <?= Html::a($group->name, 'https://vk.com/' . $group->domain) ?>
</div>
<div class="partner">
    <?= Html::a('Участники ' . $group->members_count) ?>
    <div class="update">
        Последнее обновление <?= date('H:i d-m-Y', $group->last_update) ?>
        <?= Html::a('Обновить', '#', ['class' => 'vk_update_group', 'data-group-id' => $group->id]) ?>
    </div>
</div>

<div class="goods">
    <?php if ($group->prod_count > 0): ?>
        <a href="">Количество товаров <?= $group->prod_count ?></a>
    <?php else: ?>
        <span>Товаров не найдено</span>
    <?php endif; ?>

    <div class="goods__actions">
        <?php if ($group->prod_count > 0): ?>
            <a href="#" class="goods__action get-goods-btn">
                <span class="delivery_icon"></span>
                <span class="goods__text">Получить товары</span>
            </a>
        <?php endif; ?>
        <a href="#" class="goods__action" id="vk_del_group" data-id="<?= $group->id ?>">
            <span class="del_icon"></span>
            <span class="goods__text">Удалить группу</span>
        </a>
    </div>
</div>
<div class="get-goods">
    <span class="get-goods--hide">свернуть блок</span>
    <div class="field-ads-private_business required has-success">
        <div class="vkAdsPhone">
            <label class="label-name" for="phone">Телефон</label>
            <?= \yii\widgets\MaskedInput::widget([
                'name' => 'phone',
                'options' => [
                    'id' => 'phone',
                    'class' => 'input-name jsHint vk-ads-phone_' . $group->id,
                ],

                'mask' => ['+9 (999) 999-9999', '+99(999) 999-99-99'],
            ]) ?>
        </div>
        <div class="form-line"><label class="label-name" for="ads-private_business">Частное лицо / Бизнес</label>
            <select class="input-name jsHint selB s1_<?= $group->id ?>" name="Ads[private_business]"
                    aria-required="true" aria-invalid="false" data-group-id="<?= $group->id ?>">
                <option value="0">Частное лицо</option>
                <option value="1">Бизнес</option>
            </select>
        </div>
        <div class="selectBusiness sb_<?= $group->id ?>" style="display: none">
            <?php if ($userCompany): ?>
                <div class="form-line"><label class="label-name">Выберите организацию</label>
                    <select class="input-name sbi_<?= $group->id ?>" name="Ads[business_id]">
                        <?php foreach ($userCompany as $item): ?>
                            <option value="<?= $item->id ?>"><?= $item->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php else: ?>
                <span>У Вас нет организаций. <?= Html::a('Добавить', '/organizations/add') ?></span>
            <?php endif; ?>
        </div>
        <div class="vkSaveBtn">
            <input type="button" value="Сохранить" class="vk-save-prod" data-group-id="<?= $group->id ?>">
        </div>
    </div>
</div>
