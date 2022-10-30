<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentParameters = [
    'PARAMETERS' => [
        'MAX_FILE_SIZE' => [
            'NAME' => Loc::getMessage('MAX_FILE_SIZE'),
            'TYPE' => 'STRING',
            'DEFAULT' => '12428800'
        ],
        'REQUIRED_FIELDS' => [
            'NAME' => Loc::getMessage('REQUIRED_FIELDS'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'IBLOCK_ID' => [
            'NAME' => Loc::getMessage('COMMENTS_IBLOCK_ID'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'ELEMENT_ID' => [
            'NAME' => Loc::getMessage('ELEMENT_ID'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'FIELD_TYPES' => [
            'NAME' => Loc::getMessage('FIELDS_TYPES'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'FIELD_SEND' => [
            'NAME' => Loc::getMessage('FIELDS_SEND'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'FIELD_ATR_NAMES' => [
            'NAME' => Loc::getMessage('FIELDS_NAMES'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'FIELD_TITLES' => [
            'NAME' => Loc::getMessage('FIELDS_TITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
        'BUTTON_NAME' => [
            'NAME' => Loc::getMessage('BUTTON_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],
    ]
];
