<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arParams['SECTION_NAME'] = CIBlockSection::GetList(
    ["SORT"=>"ASC"],
    [
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ID" => $GLOBALS[$arParams["FILTER_NAME"]]["SECTION_ID"]
    ],
    false,
    ['NAME'],
    false
)->Fetch()['NAME'];
