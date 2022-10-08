<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */


if(!empty($arResult["ERROR_MESSAGE"])) {
    foreach($arResult["ERROR_MESSAGE"] as $v) {?>
       <div class="alert alert-danger"><?ShowError($v);?></div>
    <?}
}
if($arResult["OK_MESSAGE"] <> '') {
    ?><div class="alert alert-success"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>
<form action="<?=POST_FORM_ACTION_URI?>" method="post">
    <?=bitrix_sessid_post()?>
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="name">
                <?=GetMessage("NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
            </label>
            <input type="text" id="name"  name="user_name" class="form-control" value="<?=$arResult["AUTHOR_NAME"]?>">
        </div>
        <div class="col-md-4 form-group">
            <label for="phone">
                <?=GetMessage("PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
            </label>
            <input type="text" id="phone" name="user_phone" class="form-control" value="<?=$arResult["PHONE"]?>">
        </div>
        <div class="col-md-4 form-group">
            <label for="email">
                Email<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
            </label>
            <input type="email" id="email" name="user_email" class="form-control"  value="<?=$arResult["AUTHOR_EMAIL"]?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="message">
                <?=GetMessage("MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
            </label>
            <textarea id="message" name="MESSAGE" class="form-control" cols="30" rows="8"><?=$arResult["MESSAGE"]?></textarea>
        </div>
    </div>
    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
        <div class="mf-captcha mb-5">
            <div class="mf-text"><?=GetMessage("CAPTCHA")?></div>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
            <div class="mf-text"><?=GetMessage("CAPTCHA_CODE")?><span class="mf-req">*</span></div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
    <?endif;?>
    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <div class="row">
        <div class="col-md-6 form-group">
            <input name="submit" type="submit" value="<?=GetMessage("SUBMIT")?>" class="btn btn-primary">
        </div>
    </div>
</form>
