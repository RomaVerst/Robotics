<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$isCategories = explode('/', $APPLICATION->GetCurPage())[1] === 'categories';
$filter = [
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
];
if ($isCategories) {
    $filter["!CODE"] = $GLOBALS[$arParams["FILTER_NAME"]]["SECTION_CODE"];
} else {
    $filter["!ID"] = $GLOBALS[$arParams["FILTER_NAME"]]["SECTION_ID"];
}
$arResult["TAGS"] = [];
$res = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    $filter,
    false,
    ['ID', 'NAME', 'SECTION_PAGE_URL'],
    false
);
while ($section = $res->GetNext()) {
    $arResult["TAGS"][] = $section;
}
