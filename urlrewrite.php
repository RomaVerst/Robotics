<?php
$arUrlRewrite=[
    [
        'CONDITION' => '#^/categories/([a-z\\-0-9]+)/([a-z\\-0-9]+)/(\\?(.*))?#',
        'RULE' => 'SECTION_CODE=$1&ELEMENT_CODE=$2',
        'ID' => 'bitrix:news',
        'PATH' => '/categories/index.php',
        'SORT' => 100,
    ],
    [
        'CONDITION' => '#^/categories/([a-z\\-0-9]+)/(\\?(.*))?#',
        'RULE' => 'SECTION_CODE=$1',
        'ID' => 'bitrix:news',
        'PATH' => '/categories/index.php',
        'SORT' => 100,
    ],
    [
        'CONDITION' => '#^/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/index.php',
        'SORT' => 100,
    ],
];
