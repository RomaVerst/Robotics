<?php

use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!empty($arResult['ITEMS'])): ?>
<section class="site-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme home-slider">
                    <? foreach ($arResult['ITEMS'] as $item): ?>
                        <?
                        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => Loc::getMessage('CONFIRM')));
                        ?>
                        <div id="<?=$this->GetEditAreaId($item['ID']);?>">
                            <a href="<?=$item['DETAIL_PAGE_URL']?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?=$item['PREVIEW_PICTURE']?>');">
                                <div class="text half-to-full">
                                    <div class="post-meta">
                                        <span class="category"><?=$arResult['SECTION_NAME']?></span>
                                        <span class="mr-2"><?=$item['DISPLAY_DATE_ACTIVE_FROM']?></span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                    <h3><?=$item['NAME']?></h3>
                                    <p><?=$item['PREVIEW_TEXT']?></p>
                                </div>
                            </a>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<? endif;