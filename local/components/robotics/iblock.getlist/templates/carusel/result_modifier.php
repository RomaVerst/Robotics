<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arResult['SECTION_NAME'] = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    [
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ID" => $arParams["FILTER"]["SECTION_ID"]
    ],
    false,
    ['NAME'],
    false
)->Fetch()['NAME'];
foreach ($arResult['ITEMS'] as &$item) {
    if ($item['PREVIEW_PICTURE']) {
        $item['PREVIEW_PICTURE'] = CFile::ResizeImageGet(
            $item['PREVIEW_PICTURE'],
            ['width' => 800, 'height' => 534],
            BX_RESIZE_IMAGE_PROPORTIONAL,
            false
        )['src'];
    }
    if ($item['DATE_ACTIVE_FROM']) {
        $date = new DateTime($item['DATE_ACTIVE_FROM']);
        $item['DISPLAY_DATE_ACTIVE_FROM'] = date_format($date, 'F d, Y');
    }
}
unset($item);
