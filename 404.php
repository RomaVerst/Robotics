<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>
<section class="site-section py-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4" style="text-align: center;"><?$APPLICATION->ShowTitle()?></h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div style="text-align: center; margin: 40px auto; font-weight: bold;">
                Page not found
            </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
