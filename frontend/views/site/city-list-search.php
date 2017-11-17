<ul>
<?php
foreach ($model as $item): ?>
    <li>
        <span class="republic selectCity" city-id="<?= $item->id; ?>"><?= $item->name;?></span>
    </li>
<?php endforeach;?>
</ul>
