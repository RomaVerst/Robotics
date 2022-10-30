<?php

use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
if ($arResult['SUCCESS'] === 'Y') {?>
    <div class="alert alert-success"><?=Loc::getMessage('SUCCESS_MESSAGE')?></div>
<?}

if ($arResult['ERROR']){
    foreach ($arResult['ERROR'] as $error) {?>
      <div class="alert alert-danger"><?=$error?></div>
    <?}
}
?>
<form action="<?=$APPLICATION->GetCurPage()?>" method="post" enctype="multipart/form-data" >
    <?=bitrix_sessid_post()?>
    <? foreach ($arResult['QUESTIONS'] as $question): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?$isRequired = in_array($question['NAME'], $arParams['REQUIRED_FIELDS']);?>
                <label for="<?=$question['NAME']?>"><?=$question['TITLE']?><?=$isRequired ? '*' : ''?></label>
                <?
                switch ($question['TYPE']) {
                    case 'text':
                    case 'file':
                    ?>
                    <input type="<?=$question['TYPE']?>" id="<?=$question['NAME']?>"
                           <?=$isRequired ? 'required' : ''?>
                           <?=($question['TYPE'] === 'file') ? 'accept="image/png, image/jpeg"' : ''?>
                            value="<?=trim($_POST[$question['NAME']])?>"
                           name="<?=$question['NAME']?>" class="form-control<?=($question['TYPE'] === 'file') ? '-file' : ''?>">
                        <?break;
                    case 'textarea': ?>
                        <textarea name="<?=$question['NAME']?>" id="<?=$question['NAME']?>"
                                  <?=$isRequired ? 'required' : ''?>
                                  class="form-control " cols="30" rows="8"><?=trim($_POST[$question['NAME']])?></textarea>
                        <?break;
                }?>
            </div>
        </div>
    <? endforeach; ?>
    <div class="row">
        <div class="col-md-6 form-group">
            <input type="submit" value="<?=$arParams['BUTTON_NAME'] ?? Loc::getMessage('BUTTON_NAME')?>" class="btn btn-primary">
        </div>
    </div>
</form>
