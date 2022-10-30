<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult['ITEMS'] as &$item) {
    $item["DETAIL_PICTURE"] = !empty($item['DETAIL_PICTURE']) ? CFile::ResizeImageGet(
        $item['DETAIL_PICTURE'],
        ['width' => 200, 'height' => 180],
        BX_RESIZE_IMAGE_PROPORTIONAL,
        false
    ) : "";
}
unset($item);
