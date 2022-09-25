<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$APPLICATION->SetTitle($arResult['SECTION_NAME']);
if ($arResult['ITEMS']): ?>
<div class="col-md-12 col-lg-8 main-content">
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $item): ?>
        <div class="col-md-6">
            <a href="<?=$item['DETAIL_PAGE_URL']?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                <? if ($item['PREVIEW_PICTURE']): ?>
                    <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>">
                <? endif; ?>
                <div class="blog-content-body">
                    <div class="post-meta">
                        <span class="category"><?= $arResult['SECTION_NAME'] ?></span>
                        <span class="mr-2"><?=$item['DISPLAY_ACTIVE_FROM']?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                    </div>
                    <h2><?=$item['NAME']?></h2>
                </div>
            </a>
        </div>
    <? endforeach; ?>
    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
<? endif;?>
