<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

if(!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
        return;
    }
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
$pointsStart = false;
$pointsEnd = false;
$nPageWindow = 2;
if ($arResult['NavPageNomer'] - $nPageWindow > 2) {
    $pointsStart = true;
}
if ($arResult['NavPageNomer'] + $nPageWindow < $arResult['NavPageCount']) {
    $pointsEnd = true;
}
?>

<div class="row"><?=$arResult["NavTitle"]?>
    <div class="col-md-12 text-center">
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
                        <?=Loc::getMessage('nav_prev')?>
                    </a>
                </li>
                <? if ($pointsStart): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">
                            1
                        </a>
                    </li>
                    <li><strong>. . .</strong></li>
                <? endif ?>
                <? for ($i = 1; $i <= $arResult['NavPageCount']; $i++): ?>
                    <? if ($pointsStart) {
                       $i = $arResult['NavPageNomer'] - $nPageWindow;
                       $pointsStart = false;
                    }?>
                    <? if ($i <= $arResult['NavPageNomer'] + $nPageWindow){ ?>
                    <li class="page-item <?=($arResult['NavPageNomer'] == $i) ? 'active' : ''?>">
                        <a class="page-link"
                           href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>">
                            <?=$i?>
                        </a>
                    </li>
                    <?} else {
                        break;
                    }?>
                <? endfor ?>
                <? if ($pointsEnd): ?>
                    <? if ($arResult['NavPageNomer'] + $nPageWindow != $arResult['NavPageCount'] - 1): ?>
                    <li><strong>. . .</strong></li>
                    <? endif ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageCount']?>">
                            <?=$arResult['NavPageCount']?>
                        </a>
                    </li>
                <? endif ?>
                <li class="page-item">
                    <a class="page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
                        <?=Loc::getMessage('nav_next')?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
