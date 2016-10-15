<section class="adcontent">
    <div class="container">
        <div class="delivery_block">
            <div class="delivery_list">
                <div id="btn"></div>

                <span class="filter-selected-cat" data-id="<?= empty($currentCategory) ? 0 : $currentCategory->id; ?>">
                    <?php
                        if(empty($currentCategory)){
                            echo 'Выберите категорию';
                        }else{
                            echo $currentCategory->name;
                        } ?>
                </span>
            </div>
            <ul class="cities_list">
                <?php foreach($category as $item):?>
                    <li data-id="<?= $item->id;?>"><?= $item->name; ?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="yellow-block"></div>
    </div>
</section>