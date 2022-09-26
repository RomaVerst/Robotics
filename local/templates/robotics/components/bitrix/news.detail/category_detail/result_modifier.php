<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$arResult["TAGS"] = [];
$res = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    [
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "!ID" => $GLOBALS[$arParams["FILTER_NAME"]]["SECTION_ID"]
    ],
    false,
    ['ID', 'NAME', 'SECTION_PAGE_URL'],
    false
);
while ($section = $res->GetNext()) {
    $arResult["TAGS"][] = $section;
}
