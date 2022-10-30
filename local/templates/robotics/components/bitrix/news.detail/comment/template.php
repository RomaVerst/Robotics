<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<section class="site-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4"><?=$arResult['NAME']?></h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <? if ($arResult['DETAIL_PICTURE']['SRC']): ?>
                    <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>"
                         alt="<?=$arResult['DETAIL_PICTURE']['ALT']?>" style="width: 100%;" class="mb-2">
                <? endif; ?>
                <?=$arResult['DETAIL_TEXT']?>
            </div>
