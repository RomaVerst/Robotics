<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$arResult["TAGS"] = [];
$res = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    [
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "!CODE" => $GLOBALS[$arParams["FILTER_NAME"]]["SECTION_CODE"]
    ],
    false,
    ['ID', 'NAME', 'SECTION_PAGE_URL'],
    false
);
while ($section = $res->GetNext()) {
    $arResult["TAGS"][] = $section;
}
