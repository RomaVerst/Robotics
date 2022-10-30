<?php

use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
if (!empty($arResult['ITEMS'])): ?>
    <section class="news-list">
        <?foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => Loc::getMessage('CONFIRM')));
            ?>
            <div class="post-entry-horzontal">
                <a href="<?=$item['DETAIL_PAGE_URL']?>">
                    <? if ($item['DETAIL_PICTURE']): ?>
                        <div class="image element-animate" data-animate-effect="fadeIn"
                             style="background-image: url('<?=$item['DETAIL_PICTURE']['src']?>')"></div>
                    <? endif; ?>
                    <span class="text" style="color: black;border: none;">
                          <div class="post-meta">
                              <span class="category"><?=$item['NAME']?></span>
                              <span class="mr-2"><?=strtolower(FormatDate("d F Y", MakeTimeStamp($item['DATE_CREATE'])))?></span> &bullet;
                              <span class="ml-2"><?=$item['PROPERTIES']['CITY']['VALUE']?></span>
                          </div>
                          <span><?=$item['DETAIL_TEXT']?></span>
                    </span>
                </a>
            </div>
        <?endforeach;?>
    </section>
<?endif;?>
