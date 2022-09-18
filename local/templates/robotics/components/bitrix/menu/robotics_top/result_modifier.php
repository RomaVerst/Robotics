<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$parent0 = &$arResult;
foreach ($arResult as &$item) {
    $item['PARAMS']['LINK'] && ($item['LINK'] = $item['PARAMS']['LINK']);

    ${'parent' . ($item['DEPTH_LEVEL'] - 1)}['ITEMS'][] = &$item;

    if ($item['IS_PARENT']) {
        ${'parent' . $item['DEPTH_LEVEL']} = &$item;
    }
}
unset($item);

$arResult = ['ITEMS' => $arResult['ITEMS']];
