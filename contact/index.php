<?
use \Bitrix\Main\Localization\Loc;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contact");
?>
<section class="site-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1><?$APPLICATION->ShowTitle();?></h1>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <?$APPLICATION->IncludeComponent(
                    "robotics:main.feedback",
                    "contacts_feedback",
                    [
                        "EMAIL_TO" => "test@test.com",
                        "EVENT_MESSAGE_ID" => ["7"],
                        "OK_TEXT" => Loc::getMessage('OK_TEXT'),
                        "REQUIRED_FIELDS" => ["NAME", "EMAIL", "PHONE", "MESSAGE"],
                        "USE_CAPTCHA" => "Y"
                    ]
                );?>
            </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>