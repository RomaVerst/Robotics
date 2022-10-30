<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<section class="site-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4"><?=Loc::getMessage("CATEGORY")?> <?=$arResult['SECTION_NAME']?></h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="row mb-5 mt-5">
                    <div class="col-md-12">
                        <? if ($arResult['ITEMS']): ?>
                            <? foreach ($arResult['ITEMS'] as $item): ?>
                                <div class="post-entry-horzontal">
                                    <a href="<?=$item['DETAIL_PAGE_URL']?>">
                                        <? if ($item['PREVIEW_PICTURE']['SRC']): ?>
                                        <div class="image element-animate" data-animate-effect="fadeIn"
                                             style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>')"></div>
                                        <? endif; ?>
                                        <span class="text">
                                          <div class="post-meta">
                                            <span class="category"><?=$arResult['SECTION_NAME']?></span>
                                            <span class="mr-2"><?=$item['DISPLAY_ACTIVE_FROM']?></span>
                                            <? if ($arResult['COMMENTS_COUNT'][$item['ID']]): ?>
                                                &bullet;
                                                <span class="ml-2">
                                                    <span class="fa fa-comments"></span>
                                                    <?=$arResult['COMMENTS_COUNT'][$item['ID']]?>
                                                </span>
                                            <? endif; ?>
                                          </div>
                                          <h2><?=$item['NAME']?></h2>
                                        </span>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <?=Loc::getMessage('NO_ITEMS')?>
                        <? endif; ?>
                    </div>
                </div>
                <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                    <?=$arResult["NAV_STRING"]?>
                <?endif;?>
            </div>
