			<input class="childrenSelectMobile" type="hidden" name="idCat[]">
			<div class="model filter-style jsShowFilterOpen" data-sethtml="parent-<?=$parentCategoryId?>">
				<p>Подкатегория</p>
				<span class="btn-arrow jsSetFlag">Все</span>
			</div>
			<div class="mobile-filter-open jsHideFilterOpen">
				<span class="mobile-filter__close jsCloseFilterAll"><span></span><span></span></span>
<!--				<div class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span></div>-->
				<h2 class="mobile-filter-open__head">Подкатегория</h2>
				<div class="mobile-filter-open__block jsSearchFlag" data-flag="parent-<?=$parentCategoryId?>">

					<?php foreach ($categories as $category) : ?>
						<span class="jsShowFlag childrenCategoryMobile" data-id="<?=$category->id?>"><?=$category->name ?></span>
					<?php endforeach;?>

				</div>
			</div>