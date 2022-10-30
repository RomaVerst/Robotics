<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

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
