<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Localization\Loc;

CModule::IncludeModule("iblock");
Loc::loadMessages(__FILE__);

CJSCore::Init(array("jquery")); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");

if ($_POST && check_bitrix_sessid()) {
    COption::SetOptionInt('main', 'COMMENTS_HIDE_BLOCK', $_POST['COMMENTS_HIDE_BLOCK'] ? 1 : 0);
    COption::SetOptionString('main', 'COMMENTS_SORT', $_POST['COMMENTS_SORT']);
}

$isHideBlockComments = COption::GetOptionInt('main', 'COMMENTS_HIDE_BLOCK', 0);
$sortComments = COption::GetOptionString('main', 'COMMENTS_SORT', 'ASC');

$aTabs = [
    [
        "DIV" => "edit1",
        "TAB" => Loc::getMessage('COMMENTS_TAB'),
        "TITLE"=> Loc::getMessage('COMMENTS_TITLE')
    ]
];

$tabControl = new CAdminTabControl("tabControl", $aTabs);
?>

<? if (!empty($arErrors)): ?>
    <div class="adm-info-message-wrap adm-info-message-red">
        <div class="adm-info-message">
            <div class="adm-info-message-title"><?=Loc::getMessage('COMMENTS_ERROR')?></div>
            <? foreach ($arErrors as $error): ?>
                <?= $error ?><br/>
            <? endforeach ?>
            <div class="adm-info-message-icon"></div>
        </div>
    </div>
<? endif ?>

<? $tabControl->Begin(); ?>

<? $tabControl->BeginNextTab(); ?>
    <tr>
        <td>
            <form method="post" action="<?= $APPLICATION->GetCurPage() . '?lang=' . LANGUAGE_ID ?>" enctype="multipart/form-data"
                  name="post_form" id="post_form">
                <? echo bitrix_sessid_post(); ?>
                <div style="margin-bottom: 10px">
                    <label for="COMMENTS_HIDE_BLOCK" style="margin-right: 10px">
                        <?=Loc::getMessage('COMMENTS_HIDE_BLOCK')?>
                    </label>
                    <input id="COMMENTS_HIDE_BLOCK" type="checkbox"
                        <?=($isHideBlockComments) ? 'checked' : ''?>
                           name="COMMENTS_HIDE_BLOCK">
                </div>
                <div>
                    <label><?=Loc::getMessage('COMMENTS_SORT')?>
                        <select name="COMMENTS_SORT">
                            <option value="ASC" <?=$sortComments === 'ASC' ? 'selected' : ''?>>
                                <?=Loc::getMessage('COMMENTS_SORT_ASC')?>
                            </option>
                            <option value="DESC" <?=$sortComments === 'DESC' ? 'selected' : ''?>>
                                <?=Loc::getMessage('COMMENTS_SORT_DESC')?>
                            </option>
                        </select>
                    </label>
                </div>
                <br/><br/>
                <input class="adm-btn" type="submit" name="Update_tab1"
                       value="<?= Loc::getMessage('SUBMIT') ?>">
            </form>
        </td>
    </tr>

<? $tabControl->Buttons(); ?>
<? $tabControl->End(); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php"); ?>