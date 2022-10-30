<?php

use \Bitrix\Main\Localization\Loc;
use App\Robotics\Traits\Validator;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

class FormComponent extends CBitrixComponent
{
    use Validator;

    private $fieldsToSend = [];

    public function executeComponent()
    {
        $this->checkParams();
        $this->prepareQuestionFields();
        $request = $this->request;
        $postList = $request->getPostList()->toArray();

        if (!empty($postList) && check_bitrix_sessid()) {
            $validPostList = $this->validation($postList);
            if (in_array('file', $this->arParams['FIELD_TYPES'])) {
                $keyFile = array_search('file', $this->arParams['FIELD_TYPES']);
                $this->imageCheck($request, $keyFile);
            }
            foreach ($validPostList as $attrName => $value ) {
                $this->checkRequiredFields($attrName, $validPostList);
            }
            if (!$this->arResult['ERROR']) {
                $arFields = [];
                foreach ($this->arParams['FIELD_SEND'] as $key => $field) {
                    if ($field == 'DETAIL_PICTURE' || $field == 'PREVIEW_PICTURE') {
                        continue;
                    }
                    if (strpos($field, 'PROPERTY') !== false) {
                        $arFields['PROPERTY_VALUES'][substr($field, 9)] = $validPostList[$this->arParams['FIELD_ATR_NAMES'][$key]];
                    } else {
                        $arFields[$field] = $validPostList[$this->arParams['FIELD_ATR_NAMES'][$key]];
                    }
                }
                $arFields['ACTIVE'] = 'Y';
                $arFields['IBLOCK_ID'] = $this->arParams['IBLOCK_ID'];
                $arFields['CODE'] = CUtil::translit($arFields['NAME'], LANGUAGE_ID, ['replace_space'=>'-','replace_other'=>'-']);
                $arFields['PROPERTY_VALUES']['CATEGORY_ELEMENT'] = $this->arParams['ELEMENT_ID'];
                $arFields = array_merge($arFields, $this->fieldsToSend);
                $oElement = new CIBlockElement();

                if ($idElement = $oElement->Add($arFields)) {
                    $this->arResult['SUCCESS'] = 'Y';
                } else {
                    $this->arResult['ERROR'][] = $oElement->LAST_ERROR;
                }
            }
        }
        $this->includeComponentTemplate();
    }

    public function imageCheck($request, $keyFile)
    {
        $filesList = $request->getFileList()->toArray();
        $attrName = $this->arParams['FIELD_ATR_NAMES'][$keyFile];
        $this->checkRequiredFields($attrName, $filesList);
        $maxFileSize = (isset($this->arParams['MAX_FILE_SIZE']) && (int)$this->arParams['MAX_FILE_SIZE'] > 0) ?
            (int)$this->arParams['MAX_FILE_SIZE'] :
            12428800;
        $fieldsForCheckImage = array_merge($filesList[$attrName], ['del' => 'N'], ['MODULE_ID' => 'iblock']);
        $error = CFile::CheckImageFile($fieldsForCheckImage, $maxFileSize);
        if (strlen($error) !== 0) {
            $this->arResult['ERROR'][] = $error;
        } else if ((int)$filesList['error'] === 0) {
            $idFile = CFile::SaveFile($fieldsForCheckImage, '/comments/');
            $this->fieldsToSend['DETAIL_PICTURE'] = CFile::MakeFileArray($idFile);
        }
    }

    public function checkRequiredFields($attrName, $sendValues)
    {
        if (in_array($attrName, $this->arParams['REQUIRED_FIELDS']) && !$sendValues[$attrName]) {
            $this->arResult['ERROR'][] = Loc::getMessage('ERROR_REQUIRED') . $attrName;
        }
    }

    public function checkParams()
    {
        if (
            !$this->arParams['FIELD_TYPES'] ||
            !$this->arParams['FIELD_ATR_NAMES'] ||
            !$this->arParams['FIELD_TITLES'] ||
            !$this->arParams['IBLOCK_ID'] ||
            !$this->arParams['FIELD_SEND'] ||
            !$this->arParams['ELEMENT_ID']
        ) {
            die(Loc::getMessage('NOT_PASSED_PARAMS'));
        }
    }

    public function prepareQuestionFields()
    {
        $this->arParams['FIELD_TYPES'] = $this->stringParamsToArray($this->arParams['FIELD_TYPES']);
        $this->arParams['FIELD_ATR_NAMES'] = $this->stringParamsToArray($this->arParams['FIELD_ATR_NAMES']);
        $this->arParams['FIELD_TITLES'] = $this->stringParamsToArray($this->arParams['FIELD_TITLES']);
        $this->arParams['FIELD_SEND'] = $this->stringParamsToArray($this->arParams['FIELD_SEND']);
        $this->arParams['REQUIRED_FIELDS'] = $this->stringParamsToArray($this->arParams['REQUIRED_FIELDS']);
        $countTypes = count($this->arParams['FIELD_TYPES']);
        $countAttrNames =  count($this->arParams['FIELD_ATR_NAMES']);
        $countTitles =  count($this->arParams['FIELD_TITLES']);
        $countFieldSend =  count($this->arParams['FIELD_SEND']);
        if (
            $countTypes !== $countAttrNames ||
            $countTypes !== $countTitles ||
            $countTypes !== $countFieldSend
        ) {
            die(Loc::getMessage('NOT_CORRECT_COUNT'));
        }

        foreach ($this->arParams['FIELD_TYPES'] as $key => $type) {
            $this->arResult['QUESTIONS'][] = [
                'TYPE' => $type,
                'NAME' => $this->arParams['FIELD_ATR_NAMES'][$key],
                'TITLE' => $this->arParams['FIELD_TITLES'][$key]
            ];
        }

    }

    public function stringParamsToArray($paramString)
    {
        return $this->validation(explode(',', $paramString));
    }

}