<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arResult['SECTION_NAME'] = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    [
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "CODE" => $GLOBALS[$arParams["FILTER_NAME"]]['SECTION_CODE']
    ],
    false,
    ['NAME'],
    false
)->Fetch()['NAME'];

$itemsId = [];
foreach ($arResult['ITEMS'] as $item) {
    $itemsId[] = $item['ID'];
}
$commentsObj = CIBlockElement::GetList(
    [],
    [
        'IBLOCK_ID' => 7,
        'PROPERTY_CATEGORY_ELEMENT' => $itemsId
    ],
    false,
    false,
    ['ID', 'NAME', 'PROPERTY_CATEGORY_ELEMENT']
);
$itemCommentsCount = [];
while ($arComments = $commentsObj->Fetch()) {
    $itemCommentsCount[$arComments['PROPERTY_CATEGORY_ELEMENT_VALUE']] += 1;
}
$arResult['COMMENTS_COUNT'] = $itemCommentsCount;
