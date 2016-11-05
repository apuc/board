<ul>
<?php
foreach ($model as $item): ?>
    <span class="republic selectCity" city-id="<?= $item->id; ?>"><?= $item->name;?></span>
<?php endforeach;?>
</ul>
