<?php foreach ($info as $item): ?>
    <div class="shop-conacts__row">
        <div class="tel-geo__wrap">
            <div class="cont-tel">
                <span class="cont-tel_tel-icon"></span>
                <?php foreach ($item['address_phone'] as $phone): ?>
                    <p><?= $phone->phone; ?></p>
                <?php endforeach; ?>
            </div>
            <div class="cont-adress">
                <span class="cont-adress_geo-icon"></span>
                <p><?= \common\classes\Address::get_region_name($item->region_id); ?>, <?= \common\classes\Address::get_city_name($item->city_id);  ?>, <?= $item->address; ?></p>
            </div>
        </div>
    </div>

<?php endforeach; ?>
