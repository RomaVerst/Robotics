<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
global $APPLICATION;

$aMenuLinks = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", [
    "IS_SEF" => "Y",
    "IBLOCK_TYPE" => "content",
    "IBLOCK_ID" => 6,
    "SEF_BASE_URL" => "/categories/",
    "SECTION_PAGE_URL" => "#SECTION_CODE#/",
    "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE/#",
    "DEPTH_LEVEL" => "1",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600"
],false);
