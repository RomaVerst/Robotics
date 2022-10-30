<?
use \Bitrix\Main\Localization\Loc;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Comment");

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "comment",
    [
        "IBLOCK_ID" => 7,
        "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y"
    ]
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
