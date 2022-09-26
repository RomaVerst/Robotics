<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <h1 class="mb-4"><?=$arResult['NAME']?></h1>
                <div class="post-meta">
                    <span class="category"><?=$arParams['SECTION_NAME']?></span>
                    <span class="mr-2"><?=$arResult['DISPLAY_ACTIVE_FROM']?></span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <div class="post-content-body">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
                <? if ($arResult['TAGS']): ?>
                <div class="pt-5">
                    <p><?=Loc::getMessage('CATEGORIES')?>
                        <? foreach ($arResult['TAGS'] as $tag): ?>
                            <a href="<?=$tag['SECTION_PAGE_URL']?>"><?=$tag['NAME']?></a><?=(next($arResult['TAGS'])) ? ',' : ''?>
                        <? endforeach ?>
                    </p>
                </div>
                <? endif ?>
            </div>
